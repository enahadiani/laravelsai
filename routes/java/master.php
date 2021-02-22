<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer-akun', 'Java\HelperController@getAkunCustomer');

// Data Customer //
Route::get('customer', 'Java\CustomerController@index');
Route::get('customer-show', 'Java\CustomerController@getData');
Route::post('customer', 'Java\CustomerController@store');
Route::put('customer-ubah', 'Java\CustomerController@update');
Route::delete('customer', 'Java\CustomerController@delete');

?>