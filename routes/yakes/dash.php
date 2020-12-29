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
Route::get('data-regional', 'Yakes\DashboardController@getFilterRegional');
Route::get('data-jenis', 'Yakes\DashboardController@getFilterRasio');
Route::get('data-organik/{periode}/{regional}', 'Yakes\DashboardController@getdataOrganik');
Route::get('data-demography/{periode}/{regional}', 'Yakes\DashboardController@getdataDemography');
Route::get('data-medis/{periode}/{regional}', 'Yakes\DashboardController@getdataMedis');
Route::get('data-dokter/{periode}/{regional}', 'Yakes\DashboardController@getdataDokter');
Route::get('data-gender/{periode}/{regional}', 'Yakes\DashboardController@getdataGender');
Route::get('data-education/{periode}/{regional}', 'Yakes\DashboardController@getdataEdu');
Route::get('data-pendapatan/{tahun}/{regional}', 'Yakes\DashboardController@getdataPendapatan');
Route::get('data-beban/{tahun}/{regional}', 'Yakes\DashboardController@getdataBeban');
Route::get('data-cc/{periode}/{regional}', 'Yakes\DashboardController@getdataRealCC');
Route::get('data-bp/{periode}/{regional}', 'Yakes\DashboardController@getdataRealBP');
Route::get('data-real-beban/{periode}/{regional}', 'Yakes\DashboardController@getdataRealBeban');
Route::get('data-kunj-bpcc/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjBPCC');
Route::get('data-layanan-bpcc/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataLayananBPCC');
Route::get('data-claim/{periode}/{jenis}', 'Yakes\DashboardController@getdataClaim');
Route::get('data-kapitasi/{tahun}/{pp}', 'Yakes\DashboardController@getdataKapitasi');
Route::get('data-kapitasi-detail/{tahun}/{pp}', 'Yakes\DashboardController@getdataKapitasiDetail');
Route::get('data-bpjs-iuran/{periode}/{jenis}', 'Yakes\DashboardController@getdataIuranBPJS');
Route::get('data-bpjs-kapitasi/{periode}/{jenis}', 'Yakes\DashboardController@getdataKapitasiBPJS');
Route::get('data-bpjs-claim/{periode}/{jenis}', 'Yakes\DashboardController@getdataClaimBPJS');
Route::get('data-claimant/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataClaimant');
Route::get('data-kunj-total/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjTotal');
Route::get('data-layanan-kunj/{periode}/{jenis}/{regional}', 'Yakes\DashboardController@getdataKunjLayanan');
Route::get('data-kpku/{tahun}/{jenis}', 'Yakes\DashboardController@getdataKPKU');