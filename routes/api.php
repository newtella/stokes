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

Route::post('/v1/login', 'Api\v1\AuthController@login');

/* Route::middleware('auth:api')->group(function(){

    Route::get('/user', function (Request $request){
        return 'Privado';
    });
}); */

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
