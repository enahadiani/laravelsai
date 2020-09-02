<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Vendor //
Route::get('bidang', 'Wisata\BidangController@index');
Route::get('bidang/{id}', 'Wisata\BidangController@getData');
Route::post('bidang', 'Wisata\BidangController@store');
Route::put('bidang/{id}', 'Wisata\BidangController@update');
Route::delete('bidang/{id}', 'Wisata\BidangController@delete');

