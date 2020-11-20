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

Route::get('/posts/search','PostsController@search');

Route::get('/posts/create','PostsController@add');
Route::post('/posts/create','PostsController@create');
Route::get('/posts/confirm','PostsController@createConfirm');

Route::delete('/posts/delete/{id}','PostsController@delete');

Route::get('/posts/edit/{id}','PostsController@edit');
Route::put('/posts/update/{id}','PostsController@update');
Route::get('/posts/update/{id}','PostsController@updateConfirm');

Route::get('/upload','PostsController@upload');
Route::post('/import','PostsController@import');
Route::get('/download','PostsController@export');

Route::get('/news','NewsController@index')->name('news');
Route::delete('/news/delete/{id}','NewsController@delete');

Route::get('/news/create','NewsController@add');
Route::get('/news/confirm','NewsController@createConfirm');
