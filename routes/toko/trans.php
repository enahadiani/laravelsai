<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Penjualan Routes //
Route::get('penjualan-open', 'Toko\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Toko\PenjualanController@cekBonus');