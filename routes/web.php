<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PostsController@index');
Route::get('/posts', 'PostsController@search');

Route::get('/posts/create','PostsController@showCreate');
Route::post('/posts/create','PostsController@create');
Route::get('/posts/confirm','PostsController@createConfirm');

Route::delete('/posts/delete/{id}','PostsController@delete');

Route::get('/posts/edit/{id}','PostsController@edit');
Route::put('/posts/update/{id}','PostsController@update');
Route::get('/posts/update/{id}','PostsController@updateConfirm');

Route::get('/upload','PostsController@upload');
Route::post('/import','PostsController@import');
Route::get('/download','PostsController@export');

Route::get('/users','NewsController@index');
Route::delete('/users/delete/{id}','NewsController@delete');

Route::get('/users/create','NewsController@showCreate');
Route::post('/users/confirmation','NewsController@confirmation');
Route::post('/users/create','NewsController@create');

Route::get('/users/search', 'NewsController@search');

Route::get('/users/profile/{id}','NewsController@showProfile');

Route::get('/users/edit/{id}','NewsController@edit');
Route::put('/users/update/{id}','NewsController@update');
Route::post('/users/confirmation/{id}','NewsController@updateConfirm');

Route::get('/change', 'PasswordController@changeView');
Route::post('/changes', 'PasswordController@changePassword');
