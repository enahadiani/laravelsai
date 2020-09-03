<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Vendor //
Route::get('bidang', 'Wisata\BidangController@index');
Route::get('bidang/{id}', 'Wisata\BidangController@getData');
Route::post('bidang', 'Wisata\BidangController@store');
Route::put('bidang/{id}', 'Wisata\BidangController@update');
Route::delete('bidang/{id}', 'Wisata\BidangController@delete');

// Data Mitra //
Route::get('mitra', 'Wisata\MitraController@index');
Route::get('mitra/{id}', 'Wisata\MitraController@getData');
Route::post('mitra', 'Wisata\MitraController@store');
Route::put('mitra/{id}', 'Wisata\MitraController@update');
Route::delete('mitra/{id}', 'Wisata\MitraController@delete');

