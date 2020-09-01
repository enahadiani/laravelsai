<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Wisata\HelperController@getPeriodePnj');
Route::get('filter-nik', 'Wisata\HelperController@getNikPnj');
Route::get('filter-tanggal', 'Wisata\HelperController@getTanggalPnj');
Route::get('filter-bukti', 'Wisata\HelperController@getBuktiPnj');
Route::get('filter-periode-pmb', 'Wisata\HelperController@getPeriodePmb');
Route::get('filter-nik-pmb', 'Wisata\HelperController@getNikPmb');
Route::get('filter-bukti-pmb', 'Wisata\HelperController@getBuktiPmb');
Route::get('filter-periode-close', 'Wisata\HelperController@getPeriodeClose');
Route::get('filter-nik-close', 'Wisata\HelperController@getNikClose');
Route::get('filter-bukti-close', 'Wisata\HelperController@getBuktiClose');
Route::get('filter-barang', 'Wisata\HelperController@getBarang');
Route::get('filter-periode-retur', 'Wisata\HelperController@getPeriodeRetur');
Route::get('filter-nik-retur', 'Wisata\HelperController@getNikRetur');
Route::get('filter-bukti-retur', 'Wisata\HelperController@getBuktiRetur');
Route::get('filter-akun', 'Wisata\HelperController@getFilterAkun');
Route::get('filter-periode-keu', 'Wisata\HelperController@getFilterPeriodeKeuangan');


Route::post('lap-penjualan-harian', 'Wisata\LaporanController@getPenjualanHarian');
Route::post('lap-penjualan', 'Wisata\LaporanController@getPenjualan');
Route::post('lap-retur-beli', 'Wisata\LaporanController@getReturBeli');
Route::post('lap-pembelian', 'Wisata\LaporanController@getPembelian');
Route::post('lap-closing', 'Wisata\LaporanController@getClosing');
Route::post('lap-barang', 'Wisata\LaporanController@getBarang');
Route::post('lap-saldo', 'Wisata\LaporanController@getSaldo');
Route::post('lap-kartu', 'Wisata\LaporanController@getKartu');
Route::post('lap-nrclajur', 'Wisata\LaporanController@getNrcLajur');
Route::post('lap-jurnal', 'Wisata\LaporanController@getJurnal');
Route::post('lap-bukubesar', 'Wisata\LaporanController@getBukuBesar');
Route::post('send-laporan', 'Wisata\LaporanController@sendMail');