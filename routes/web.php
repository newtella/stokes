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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Especialidades
Route::get('/specialties', 'SpecialtyController@index'); // Catalogo de especialidades
Route::get('/specialties/create', 'SpecialtyController@create'); //form registro crear
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit'); //editar
Route::post('/specialties', 'SpecialtyController@store'); //envio del formulario guardar
Route::put('/specialties/{specialty}', 'SpecialtyController@update'); //actualizar
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy'); //eliminar

//Doctors
Route::resource('doctors', 'DoctorController');

//Patients
