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
Route::get('sdm-dash', 'Esaku\Sdm\DashboardController@getDataDashboard');
Route::get('sdm-karyawan', 'Esaku\Sdm\DashboardController@getDataKaryawan');
Route::get('sdm-client', 'Esaku\Sdm\DashboardController@getDataClient');
Route::get('sdm-bpjs-sehat', 'Esaku\Sdm\DashboardController@getDataBPJSKesehatan');
Route::get('sdm-bpjs-kerja', 'Esaku\Sdm\DashboardController@getDataBPJSTenagaKerja');
