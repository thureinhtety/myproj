<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test',function(){
    return response()->json(['message' => 'HelloWorld']);
});

//Route::middleware('auth:api')->get('/post/list','API\PostsApiController@index');

Route::get('/post/list','API\PostsApiController@index');
Route::post('/post','API\PostsApiController@create');
Route::put('/post/{id}','API\PostsApiController@update');
Route::delete('/post/{id}','API\PostsApiController@delete');

Route::get('/user/list','API\UserApiController@index');
Route::post('/user','API\UserApiController@create');
Route::get('/user/{id}','API\UserApiController@profile');
Route::put('/user/{id}','API\UserApiController@update');
Route::delete('/user/{id}','API\UserApiController@delete');

Route::post('/login','API\UserApiController@login');
Route::post('/logout','API\UserApiController@logout');
