<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('vendor-akun', 'Wisata\HelperController@getAkunVend');

// Data Vendor //
Route::get('vendor', 'Wisata\VendorController@index');
Route::get('vendor/{id}', 'Wisata\VendorController@getData');
Route::post('vendor', 'Wisata\VendorController@store');
Route::put('vendor/{id}', 'Wisata\VendorController@update');
Route::delete('vendor/{id}', 'Wisata\VendorController@delete');

