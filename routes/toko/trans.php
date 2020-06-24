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

//Close Kasir //
Route::get('close-kasir-new', 'Toko\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Toko\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Toko\CloseKasirController@getData');
Route::post('close-kasir', 'Toko\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Toko\PembelianController@index');
Route::get('pembelian-barang', 'Toko\PembelianController@getBarang');
Route::post('pembelian', 'Toko\PembelianController@store');
Route::put('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@delete');
Route::get('pembelian-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Toko\PembelianController@show');
