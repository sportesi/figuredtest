<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'Frontend\HomeController@index')->name('frontend_home');

Route::post('/post', 'Frontend\PostController@store')->name('frontend_post_store');
Route::put('/post/edit/{id}', 'Frontend\PostController@update')->name('frontend_post_update');