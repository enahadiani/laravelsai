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

Route::get('/ptg-beban', 'Bdh\PtgBebanController@index');
Route::get('ptg-beban/{id}', 'Bdh\PtgBebanController@show');

// option
Route::get('nik-buat', 'Bdh\PtgBebanController@getNikBuat');
Route::get('nik-tahu', 'Bdh\PtgBebanController@getNikTahu');
Route::get('nik-ver', 'Bdh\PtgBebanController@getNikVer');
