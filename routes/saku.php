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

Route::get('/form/{id}', function ($id) {
    return view('saku.'.$id);
    
});

Route::get('/', 'Saku\AuthController@index');
Route::get('/dash', 'Saku\AuthController@index');
Route::get('/menu', 'Saku\AuthController@getMenu');
Route::get('/login', 'Saku\AuthController@login');
Route::post('/login', 'Saku\AuthController@cek_auth');
Route::get('/logout', 'Saku\AuthController@logout');

Route::get('/fsAll', 'Saku\FSController@fs');
Route::post('/fs', 'Saku\FSController@store');
Route::get('/fs/{id}', 'Saku\FSController@show');
Route::put('/fs/{id}','Saku\FSController@update');
Route::delete('/fs/{id}','Saku\FSController@destroy');


