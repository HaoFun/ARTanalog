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
    $route->post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    $route->get('/forget_password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    $route->resource('user', 'Admin\UserController', ['as' => 'admin', 'except' => ['show']]);
    $route->resource('news', 'Admin\NewsController', ['as' => 'admin', 'except' => ['show']]);
    $route->resource('tag', 'Admin\TagController', ['as' => 'admin', 'except' => ['show']]);
    $route->resource('product', 'Admin\ProductController', ['as' => 'admin', 'except' => ['show']]);

    $route->get('/display', 'Admin\DisplayController@edit')->name('admin.display.edit');
    $route->patch('/display', 'Admin\DisplayController@update')->name('admin.display.update');
});