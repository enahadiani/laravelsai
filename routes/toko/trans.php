<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Penjualan Routes //
Route::get('penjualan-open', 'Toko\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Toko\PenjualanController@cekBonus');
Route::post('penjualan', 'Toko\PenjualanController@store');

//Open Kasir //
Route::get('open-kasir', 'Toko\OpenKasirController@index');
Route::post('open-kasir', 'Toko\OpenKasirController@store');
Route::put('open-kasir/{nik}/{no_open}', 'Toko\OpenKasirController@update');
