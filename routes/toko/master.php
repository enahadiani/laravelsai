<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Toko\HelperController@getAkunCust');
Route::get('vendor-akun', 'Toko\HelperController@getAkunVend');
Route::get('gudang-nik', 'Toko\HelperController@getNIKGud');
Route::get('gudang-pp', 'Toko\HelperController@getPPGud');
Route::get('barang-klp-persediaan', 'Toko\HelperController@getAkunPersKelBar');
Route::get('barang-klp-pendapatan', 'Toko\HelperController@getAkunPdptKelBar');
Route::get('barang-klp-hpp', 'Toko\HelperController@getAkunHPPKelBar');

// Data Customer //
Route::get('cust', 'Toko\CustomerController@index');
Route::get('cust/{id}', 'Toko\CustomerController@getData');
Route::post('cust', 'Toko\CustomerController@store');
Route::put('cust/{id}', 'Toko\CustomerController@update');
Route::delete('cust/{id}', 'Toko\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Toko\VendorController@index');
Route::get('vendor/{id}', 'Toko\VendorController@getData');
Route::post('vendor', 'Toko\VendorController@store');
Route::put('vendor/{id}', 'Toko\VendorController@update');
Route::delete('vendor/{id}', 'Toko\VendorController@delete');

// Data Gudang //
Route::get('gudang', 'Toko\GudangController@index');
Route::get('gudang/{id}', 'Toko\GudangController@getData');
Route::post('gudang', 'Toko\GudangController@store');
Route::put('gudang/{id}', 'Toko\GudangController@update');
Route::delete('gudang/{id}', 'Toko\GudangController@delete');

// Data Kelompok Barang //
Route::get('barang-klp', 'Toko\KelompokBarangController@index');
Route::get('barang-klp/{id}', 'Toko\KelompokBarangController@getData');
Route::post('barang-klp', 'Toko\KelompokBarangController@store');
Route::put('barang-klp/{id}', 'Toko\KelompokBarangController@update');
Route::delete('barang-klp/{id}', 'Toko\KelompokBarangController@delete');

// Data Satuan Barang //
Route::get('barang-satuan', 'Toko\SatuanBarangController@index');
Route::get('barang-satuan/{id}', 'Toko\SatuanBarangController@getData');
Route::post('barang-satuan', 'Toko\SatuanBarangController@store');
Route::put('barang-satuan/{id}', 'Toko\SatuanBarangController@update');
Route::delete('barang-satuan/{id}', 'Toko\SatuanBarangController@delete');
