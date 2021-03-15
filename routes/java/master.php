<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer-akun', 'Java\HelperController@getAkunCustomer');
Route::get('vendor-akun', 'Java\HelperController@getAkunVendor');
Route::get('negara', 'Java\HelperController@getNegara');
Route::get('provinsi', 'Java\HelperController@getProvinsi');
Route::get('kota', 'Java\HelperController@getKota');
Route::get('kecamatan', 'Java\HelperController@getKecamatan');

// Data Customer //
Route::get('customer', 'Java\CustomerController@index');
Route::get('customer-show', 'Java\CustomerController@getData');
Route::get('customer-check', 'Java\CustomerController@isUnik');
Route::post('customer', 'Java\CustomerController@store');
Route::put('customer-ubah', 'Java\CustomerController@update');
Route::delete('customer', 'Java\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Java\VendorController@index');
Route::get('vendor-show', 'Java\VendorController@getData');
Route::get('vendor-check', 'Java\VendorController@isUnik');
Route::post('vendor', 'Java\VendorController@store');
Route::put('vendor-ubah', 'Java\VendorController@update');
Route::delete('vendor', 'Java\VendorController@delete');

?>