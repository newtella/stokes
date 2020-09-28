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
Route::get('/v1/logout', 'Api\v1\AuthController@logout')->middleware('auth:api');

Route::get('/v1/appointments','Api\v1\AppointmentController@index')->middleware('auth:api');
Route::post('/v1/appointments','Api\v1\AppointmentController@store')->middleware('auth:api');
Route::get('/v1/appointments/{id}','Api\v1\AppointmentController@show')->middleware('auth:api');
Route::put('/v1/appointments/{id}','Api\v1\AppointmentController@update')->middleware('auth:api');
Route::delete('/v1/appointments/{id}','Api\v1\AppointmentController@destroy')->middleware('auth:api');
/* Route::middleware('auth:api')->group(function(){

    Route::get('/user', function (Request $request){
        return 'Privado';
    });
}); */

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
