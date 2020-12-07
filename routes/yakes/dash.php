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

Route::get('data-tahun', 'Yakes\DashboardController@getFilterTahun');
Route::get('data-periode', 'Yakes\DashboardController@getFilterPeriode');
Route::get('data-organik/{periode}', 'Yakes\DashboardController@getdataOrganik');
Route::get('data-demography/{periode}', 'Yakes\DashboardController@getdataDemography');
Route::get('data-medis/{periode}', 'Yakes\DashboardController@getdataMedis');
Route::get('data-dokter/{periode}', 'Yakes\DashboardController@getdataDokter');
Route::get('data-gender/{periode}', 'Yakes\DashboardController@getdataGender');
Route::get('data-education/{periode}', 'Yakes\DashboardController@getdataEdu');
Route::get('data-pendapatan/{tahun}', 'Yakes\DashboardController@getdataPendapatan');
Route::get('data-beban/{tahun}', 'Yakes\DashboardController@getdataBeban');
Route::get('data-cc/{periode}', 'Yakes\DashboardController@getdataRealCC');
Route::get('data-bp/{periode}', 'Yakes\DashboardController@getdataRealBP');
Route::get('data-real-beban/{periode}', 'Yakes\DashboardController@getdataRealBeban');
Route::get('data-kunj-bpcc/{periode}/{jenis}', 'Yakes\DashboardController@getdataKunjBPCC');
Route::get('data-layanan-bpcc/{periode}/{jenis}', 'Yakes\DashboardController@getdataLayananBPCC');