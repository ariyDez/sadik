<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Sentinel;
use Activation;
use Reminder;
use Validator;
use Mail;
use Storage;
use CurlHttp;

class AuthController extends Controller
{
    /*
     * Show login page
     *
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Show wait page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wait()
    {
        return view('auth.wait');
    }

    /**
     * Process login users
     *
     * @param Request $request
     * @return $this
     */
    public function loginProcess(Request $request)
    {
        try
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $remember = (bool) $request->remember;
            if(Sentinel::authenticate($request->all(), $remember))
            {
                return Redirect::intended('/');
            }
            $errors = 'Неправильный логин или пароль.';
            return Redirect::back()
                ->withInput()
                ->withErrors($errors);
        }
        catch(NotActivatedException $e)
        {
            $sentuser = $e->getUser();
            $activation = Activation::create($sentuser);
            $code = $activation->code;
            $sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use($sentuser,$code)
            {
                $m->from('noreplay@mysite.ru', 'LaravelSite');
                $m->to($sentuser->email)->subject('Активация');
                mail($sentuser->email, 'Activation', "Для активации аккаунта пройдите по <a href='http://test.laravel/activate/{$sentuser->getUserId()}/{$code}\") }}\">ссылке</a>");
            });

            if($sent === 0)
            {
                return Redirect::to('login')
                    ->withErrors('Ошибка отправки письма активации.');
            }
            $errors = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации (Вам отправлено повторное письмо). ';
            return view('auth.login')->withErrors($errors);
        }
        catch(ThrottlingException $e)
        {
            $delay = $e->getDelay();
            $errors = "Ваш аккаунт блокирован на {$delay} секунд.";
        }
        return Redirect::back()
            ->withInput()
            ->withErrors($errors);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function registerProcess(Request $request)
    {
        $this->validate($request, [
            'email' => 'required:email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $input = $request->all();
        $credentials = ['email' => $request->email ];
        if($user = Sentinel::findByCredentials($credentials))
        {
            return Redirect::to('register')
                ->withErrors('Такой Email уже зарегистрирован.');
        }

        if($sentuser = Sentinel::register($input))
        {
            $activaton = Activation::create($sentuser);
            $code = $activaton->code;
            $sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use($sentuser,$code)
            {
                $m->from('noreply@mysite.ru', 'LaravelSite');
                $m->to($sentuser->email)->subject('Активация аккаунта');
                mail($sentuser->email, 'Activation', "Для активации аккаунта пройдите по <a href='http://test.laravel/activate/{$sentuser->getUserId()}/{$code}\") }}\">ссылке</a>");
            });
            if($sent === 0)
            {
                return Redirect::to('register')
                    ->withErrors('Ошибка отправки письма активации.');
            }

            $role = Sentinel::findRoleBySlug('user');
            $role->users()->attach($sentuser);

            return Redirect::to('login')
                ->withSuccess('Ваш аккаунт создан. Проверьте Email для активации.')
                ->with('userId', $sentuser->getUserId());
        }
        return Redirect::to('register')
            ->withInput()
            ->wihtErrors('Failed to register');
    }

    /**
     * @param $id
     * @param $code
     * @return mixed
     */
    public function activate($id, $code)
    {
        $sentuser = Sentinel::findById($id);

        if( ! Activation::complete($sentuser, $code))
        {
            return Redirect::to('login')
                ->withErrors('Неверный или просроченный код активации.');
        }

        return Redirect::to('login')
            ->withSuccess('Аккаунт активирован.');
    }

    public function resetOrder(){
        return view('auth.reset_order');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function resetOrderProcess(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $email = $request->email;
        $sentuser = Sentinel::findByCredentials(compact('email'));
        if( ! $sentuser)
        {
            return Rediret::back()
                ->withInput()
                ->withErrors('Пользователь с таким E-Mail в системе не найден.');
        }
        $reminder = Reminder::exists($sentuser) ?: Reminder::create($sentuser);
        $code = $reminder->code;

        $sent = Mail::send('mail.account_reminder', compact('sentuser', 'code'), function($m) use($sentuser)
        {
            $m->from('noreply@mysite.com', 'SiteLaravel');
            $m->to($sentuser->email)->subject('Сброс пароля');
        });

        if($sent === 0)
        {
            return Redirect::to('reset')
                ->withErrors('Ошибка отправки email.');
        }
        return Redirect::to('wait');
    }


    /**
     * @param $id
     * @param $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetComplete($id, $code)
    {
        $user = Sentinel::findById($id);
        return view('auth.reset_complete');
    }

    /**
     * @param Request $request
     * @param $id
     * @param $code
     * @return mixed
     */
    public function resetCompleteProcess(Request $request, $id, $code)
    {
        $this->validate($request, [
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $user = Sentinel::findById($id);
        if( ! $user)
        {
            return Redirect::back()
                ->withInput()
                ->withErrors('Такого пользователя не существует.');
        }
        if( ! Reminder::complete($user, $code, $request->password))
        {
            return Redirect::to('login')
                ->withErrors('Неверный или просроченный код сброса пароля.');
        }
        return Redirect::to('login')
            ->withSuccess('Пароль сброшен.');
    }

    /**
     * @return mixed
     */
    public function logoutuser()
    {
        Sentinel::logout();
        return Redirect::intended('/');
    }



}
