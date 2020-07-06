<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Toko\HelperController@getPeriodePnj');
Route::get('filter-nik', 'Toko\HelperController@getNikPnj');
Route::get('filter-bukti', 'Toko\HelperController@getBuktiPnj');
Route::get('filter-periode-pmb', 'Toko\HelperController@getPeriodePmb');
Route::get('filter-nik-pmb', 'Toko\HelperController@getNikPmb');
Route::get('filter-bukti-pmb', 'Toko\HelperController@getBuktiPmb');

Route::post('lap-penjualan', 'Toko\LaporanController@getPenjualan');
Route::post('lap-pembelian', 'Toko\LaporanController@getPembelian');