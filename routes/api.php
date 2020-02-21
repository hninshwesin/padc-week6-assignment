<?php

use Illuminate\Http\Request;

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

Route::post('v1/login','Api\v1\LoginController@index');

Route::prefix('v1/')->middleware('auth:api')->namespace('Api\v1')->group(function (){
    Route::apiResource('post', 'PostController');

    Route::apiResource('category', 'CategoryController');
});



