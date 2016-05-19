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

    // ������������ ����� ������ � �������� ����� ������. ��� ������ �������� -
    // �������� � �������� E-Mail ������������
    Route::get('reset', 'AuthController@resetOrder');

    // ������������ �������� � �������� ����� � E-Mail � ������� �� ����� ������
    Route::post('reset', 'AuthController@resetOrderProcess');

    // ������������ ������ ������ �� ������� �� ��� �������� ��� ����� ������ ������
    Route::get('reset/{id}/{code}', 'AuthController@resetComplete');

    // ������������ ���� ����� ������ � ��������
    Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');

    // ��������� ���������, ���������� ����� ���������� ���. �����, ����� ������ ������ �
    // � ���, ��� ������ ���������� � ���� ��������� � �������� ����.

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
});
