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
Route::post('ptg-beban', 'Bdh\PtgBebanController@store');
Route::post('ptg-beban-ubah', 'Bdh\PtgBebanController@update');
// option
Route::get('nik-buat', 'Bdh\PtgBebanController@getNikBuat');
Route::get('nik-tahu', 'Bdh\PtgBebanController@getNikTahu');
Route::get('nik-ver', 'Bdh\PtgBebanController@getNikVer');
Route::get('akun', 'Bdh\PtgBebanController@getAkun');
Route::get('pp', 'Bdh\PtgBebanController@getPP');
Route::get('drk', 'Bdh\PtgBebanController@getDrk');
Route::get('dok-jenis', 'Bdh\PtgBebanController@getJenis');
