<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Toko\HelperController@getPeriode');
Route::get('filter-nik', 'Toko\HelperController@getNik');
Route::get('filter-bukti', 'Toko\HelperController@getBukti');

Route::post('lap-penjualan', 'Toko\LaporanController@getPenjualan');