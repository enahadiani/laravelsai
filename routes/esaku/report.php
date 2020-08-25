<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Esaku\HelperController@getPeriodePnj');
Route::get('filter-nik', 'Esaku\HelperController@getNikPnj');
Route::get('filter-tanggal', 'Esaku\HelperController@getTanggalPnj');
Route::get('filter-bukti', 'Esaku\HelperController@getBuktiPnj');
Route::get('filter-periode-pmb', 'Esaku\HelperController@getPeriodePmb');
Route::get('filter-nik-pmb', 'Esaku\HelperController@getNikPmb');
Route::get('filter-bukti-pmb', 'Esaku\HelperController@getBuktiPmb');
Route::get('filter-periode-close', 'Esaku\HelperController@getPeriodeClose');
Route::get('filter-nik-close', 'Esaku\HelperController@getNikClose');
Route::get('filter-bukti-close', 'Esaku\HelperController@getBuktiClose');
Route::get('filter-barang', 'Esaku\HelperController@getBarang');
Route::get('filter-periode-retur', 'Esaku\HelperController@getPeriodeRetur');
Route::get('filter-nik-retur', 'Esaku\HelperController@getNikRetur');
Route::get('filter-bukti-retur', 'Esaku\HelperController@getBuktiRetur');
Route::get('filter-akun', 'Esaku\HelperController@getFilterAkun');
Route::get('filter-periode-keu', 'Esaku\HelperController@getFilterPeriodeKeuangan');


Route::post('lap-penjualan-harian', 'Esaku\LaporanController@getPenjualanHarian');
Route::post('lap-penjualan', 'Esaku\LaporanController@getPenjualan');
Route::post('lap-retur-beli', 'Esaku\LaporanController@getReturBeli');
Route::post('lap-pembelian', 'Esaku\LaporanController@getPembelian');
Route::post('lap-closing', 'Esaku\LaporanController@getClosing');
Route::post('lap-barang', 'Esaku\LaporanController@getBarang');
Route::post('lap-saldo', 'Esaku\LaporanController@getSaldo');
Route::post('lap-kartu', 'Esaku\LaporanController@getKartu');
Route::post('lap-nrclajur', 'Esaku\LaporanController@getNrcLajur');
Route::post('lap-jurnal', 'Esaku\LaporanController@getJurnal');
Route::post('lap-bukubesar', 'Esaku\LaporanController@getBukuBesar');
Route::post('send-laporan', 'Esaku\LaporanController@sendMail');