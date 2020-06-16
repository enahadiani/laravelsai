<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Toko\HelperController@getAkunCust');
Route::get('vendor-akun', 'Toko\HelperController@getAkunVend');

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
