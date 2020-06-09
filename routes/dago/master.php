<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('pekerjaan', 'Dago\PekerjaanController@index');
Route::get('pekerjaan/{id}', 'Dago\PekerjaanController@getData');
Route::post('pekerjaan', 'Dago\PekerjaanController@store');
Route::put('pekerjaan/{id}', 'Dago\PekerjaanController@update');
Route::delete('pekerjaan/{id}', 'Dago\PekerjaanController@delete');
