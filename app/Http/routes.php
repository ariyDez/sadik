<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    /*
     * Route for auth system
     */
    // Вызов страницы регистрации пользователя
    Route::get('register', 'AuthController@register');

    // Пользователь заполнил форму регистрации и отправил
    Route::post('register', 'AuthController@registerProcess');

    // Пользователь получил письмо для активации аккаунта со ссылкой
    Route::get('activate/{id}/{code}', 'AuthController@activate');

    // Вызов страницы авторизации
    Route::get('login', 'AuthController@login');

    // Пользователь заполнил форму авторизации и отправил
    Route::post('login', 'AuthController@loginProcess');

    // Выход пользователя из системы
    Route::get('logout', 'AuthController@logoutuser');
    Route::get('admin/logout', 'AuthController@logoutuser');

    // Пользователь забыл пароль и запросил сброс пароля. Это начало процесса -
    // Страница с запросом E-Mail пользователя
    Route::get('reset', 'AuthController@resetOrder');

    // Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
    Route::post('reset', 'AuthController@resetOrderProcess');

    // Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
    Route::get('reset/{id}/{code}', 'AuthController@resetComplete');

    // Пользователь ввел новый пароль и отправил.
    Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');

    // Сервисная страничка, показываем после заполнения рег формы, формы сброса и т.
    // о том, что письмо отправлено и надо заглянуть в почтовый ящик.

    Route::get('/', 'IndexController@index');
    Route::get('wait', 'AuthController@wait');

    Route::get('articles', 'ArticlesController@index');
    Route::get('articles/{id}', 'ArticlesController@show');

    Route::get('districts', 'DistrictController@index');
    Route::get('districts/{id}', 'DistrictController@show');

    Route::get('types', 'TypeController@index');
    Route::get('types/{id}', 'TypeController@show');

    Route::get('movies', 'MovieController@index');
    Route::get('movies/{id}', 'MovieController@show');
    
    Route::get('goods/{id}', 'GoodController@show');
    
    Route::get('competitions', 'CompetitionController@index');
    Route::get('competitions/{id}', 'CompetitionController@show');
    Route::get('competitions/{id}/join', 'CompetitionController@joinShow');
    Route::post('competitions/{id}/joinProcess', 'CompetitionController@joinProcess');
    Route::get('join', 'PhotoCompetitionController@showJoin');
    Route::post('/competition/join', 'PhotoCompetitionController@joinProcess');
    //Route::get('join', ['middleware'=>'isadmin', 'uses' => 'PhotoCompetitionController@showJoin']);

    // only test
    Route::get('test', 'TestController@test');
    Route::get('image', 'TestController@image');
});
