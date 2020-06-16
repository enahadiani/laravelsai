<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Toko\HelperController@getAkun');

// Data Customer //
Route::get('cust', 'Toko\CustomerController@index');
Route::get('cust/{id}', 'Toko\CustomerController@getData');
Route::post('cust', 'Toko\CustomerController@store');
Route::put('cust/{id}', 'Toko\CustomerController@update');
Route::delete('cust/{id}', 'Toko\CustomerController@delete');
