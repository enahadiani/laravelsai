<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer-akun', 'Java\HelperController@getAkunCustomer');
Route::get('vendor-akun', 'Java\HelperController@getAkunVendor');

// Data Customer //
Route::get('customer', 'Java\CustomerController@index');
Route::get('customer-show', 'Java\CustomerController@getData');
Route::get('customer-check', 'Java\CustomerController@isUnik');
Route::post('customer', 'Java\CustomerController@store');
Route::put('customer-ubah', 'Java\CustomerController@update');
Route::delete('customer', 'Java\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Java\CustomerController@index');
Route::get('vendor-show', 'Java\CustomerController@getData');
Route::post('vendor', 'Java\CustomerController@store');
Route::put('vendor-ubah', 'Java\CustomerController@update');
Route::delete('vendor', 'Java\CustomerController@delete');

?>