<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('customer', 'Java\HelperController@getCustomer');
Route::get('vendor', 'Java\HelperController@getVendor');
Route::get('rab-proyek-cbbl', 'Java\HelperController@getProyekRab');
Route::get('beban-proyek-cbbl', 'Java\HelperController@getProyekBeban');

// Data Proyek //
Route::get('proyek', 'Java\ProyekController@index');
Route::get('proyek-show', 'Java\ProyekController@getData');
Route::get('proyek-check', 'Java\ProyekController@isUnikProyek');
Route::get('kontrak-check', 'Java\ProyekController@isUnikKontrak');
Route::post('proyek', 'Java\ProyekController@store');
Route::put('proyek-ubah', 'Java\ProyekController@update');
Route::delete('proyek', 'Java\ProyekController@delete');

// Data Proyek RAB //
Route::get('rab-proyek', 'Java\RabProyekController@index');
Route::get('rab-proyek-show', 'Java\RabProyekController@getData');
Route::post('rab-proyek', 'Java\RabProyekController@store');
Route::put('rab-proyek-ubah', 'Java\RabProyekController@update');
Route::delete('rab-proyek', 'Java\RabProyekController@delete');

// Data Beban
Route::get('biaya-proyek', 'Java\BiayaProyekController@index');

?>