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

Route::get('sdm-box-pegawai', 'Esaku\Sdm\DashboardBoxController@getPegawai');
Route::get('sdm-box-sehat', 'Esaku\Sdm\DashboardBoxController@getBPJSSehat');
Route::get('sdm-box-kerja', 'Esaku\Sdm\DashboardBoxController@getBPJSKerja');
Route::get('sdm-box-client', 'Esaku\Sdm\DashboardBoxController@getBPJSClient');
Route::get('sdm-box-gender', 'Esaku\Sdm\DashboardBoxController@getKelompokGender');

Route::get('sdm-chart-pendidikan', 'Esaku\Sdm\DashboardChartController@getPendidikan');
Route::get('sdm-chart-umur', 'Esaku\Sdm\DashboardChartController@getUmur');
Route::get('sdm-chart-unitp', 'Esaku\Sdm\DashboardChartController@getUnitPie');
Route::get('sdm-chart-unitc', 'Esaku\Sdm\DashboardChartController@getUnitCol');
Route::get('sdm-chart-gaji', 'Esaku\Sdm\DashboardChartController@getGaji');

Route::get('sdm-detail-pegawai', 'Esaku\Sdm\DashboardDetailPegawaiController@getDataPegawai');
Route::get('sdm-detail-cv', 'Esaku\Sdm\DashboardDetailPegawaiController@getDataPegawaiDetail');

Route::get('sdm-detail-bpjs-sehat-komposisi', 'Esaku\Sdm\DashboardDetailBPJSController@getKomposisiBPJSSehat');
Route::get('sdm-detail-bpjs-kerja-komposisi', 'Esaku\Sdm\DashboardDetailBPJSController@getKomposisiBPJSKerja');

Route::get('sdm-detail-bpjs-sehat-register', 'Esaku\Sdm\DashboardDetailBPJSController@getDataBPJSSehatRegister');
Route::get('sdm-detail-bpjs-sehat-unregister', 'Esaku\Sdm\DashboardDetailBPJSController@getDataBPJSSehatUnRegister');
Route::get('sdm-detail-bpjs-kerja-register', 'Esaku\Sdm\DashboardDetailBPJSController@getDataBPJSKerjaRegister');
Route::get('sdm-detail-bpjs-kerja-unregister', 'Esaku\Sdm\DashboardDetailBPJSController@getDataBPJSKerjaUnRegister');
