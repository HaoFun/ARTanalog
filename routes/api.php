<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getTag/{type}', 'Admin\TagController@tagList')->name('admin.tag.list');
Route::get('/getChild/{type}', 'Admin\TagController@childList')->name('admin.tag.child_list');
