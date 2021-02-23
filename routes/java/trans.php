<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer', 'Java\HelperController@getCustomer');
Route::get('vendor', 'Java\HelperController@getVendor');

// Data Customer //
Route::get('proyek', 'Java\ProyekController@index');
Route::get('proyek-show', 'Java\ProyekController@getData');
Route::get('proyek-check', 'Java\ProyekController@isUnikProyek');
Route::get('kontrak-check', 'Java\ProyekController@isUnikKontrak');
Route::post('proyek', 'Java\ProyekController@store');
Route::put('proyek-ubah', 'Java\ProyekController@update');
Route::delete('proyek', 'Java\ProyekController@delete');

?>