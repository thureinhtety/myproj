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

Route::get('/create','PostsController@add');
Route::post('/create','PostsController@create');
Route::get('/confirm','PostsController@createConfirm');

Route::delete('/delete/{id}','PostsController@delete');

Route::get('/edit/{id}','PostsController@edit');
Route::put('/update/{id}','PostsController@update');
Route::get('/update/{id}','PostsController@updateConfirm');


