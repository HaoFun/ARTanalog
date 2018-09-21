<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::prefix('admin')->group(function($route) {
    $route->get('/', 'Admin\AdminController@index')->name('admin.home');
    $route->get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    $route->post('/login', 'Auth\LoginController@login')->name('admin.login.action');
    $route->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    $route->post('/register', 'Auth\RegisterController@register')->name('admin.register.action');
    $route->post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    $route->get('/forget_password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');


    $route->get('/user', 'Admin\UserController@index')->name('admin.user.index');
    $route->get('/user/{user}', 'Admin\UserController@edit')->name('admin.user.edit');
    $route->patch('/user/{user}', 'Admin\UserController@update')->name('admin.user.update');
    $route->delete('/user/{user}', 'Admin\UserController@destory')->name('admin.user.destroy');
});