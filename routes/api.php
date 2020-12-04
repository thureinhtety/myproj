<?php

use App\Http\Controllers\PostsController;
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

Route::get('/post/list','API\PostsApiController@index');
Route::post('/post','API\PostsApiController@create');
Route::get('/post/{id}','API\PostsApiController@show');
Route::put('/post/{id}','API\PostsApiController@update');
Route::delete('/post/{id}','API\PostsApiController@delete');





Route::get('/user/list','API\UserApiController@index');