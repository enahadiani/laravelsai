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
Route::get('sdm-karyawan-detail', 'Esaku\Sdm\DashboardController@getDataKaryawanDetail');
Route::get('sdm-client', 'Esaku\Sdm\DashboardController@getDataClient');
Route::get('sdm-list-client', 'Esaku\Sdm\DashboardController@getDataListClient');
Route::get('sdm-bpjs-sehat', 'Esaku\Sdm\DashboardController@getDataBPJSKesehatan');
Route::get('sdm-bpjs-kerja', 'Esaku\Sdm\DashboardController@getDataBPJSTenagaKerja');
Route::get('sdm-gaji', 'Esaku\Sdm\DashboardController@getDataGaji');
Route::get('sdm-umur', 'Esaku\Sdm\DashboardController@getDataUmur');
Route::get('sdm-searchbpjs-sehat', 'Esaku\Sdm\DashboardController@getListBPJSKesehatanTerdaftar');
Route::get('sdm-searchnonbpjs-sehat', 'Esaku\Sdm\DashboardController@getListBPJSKesehatanNonTerdaftar');
Route::get('sdm-searchbpjs-kerja', 'Esaku\Sdm\DashboardController@getListBPJSKetenagaanTerdaftar');
Route::get('sdm-searchnonbpjs-kerja', 'Esaku\Sdm\DashboardController@getListBPJSKetenagaanNonTerdaftar');
