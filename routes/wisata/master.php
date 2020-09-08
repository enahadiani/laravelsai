<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper//
Route::get('getMitra', 'Wisata\HelperController@getMitra');
Route::get('getTglServer', 'Wisata\HelperController@getTglServer');
Route::get('getMitraBid', 'Wisata\HelperController@getMitraBid');
Route::get('getTahunList', 'Wisata\HelperController@getTahunList');
Route::get('getJumlahTgl/{tahun}/{bulan}', 'Wisata\HelperController@getJumlahTgl');

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

// Data Kunjungan //
Route::get('kunjungan', 'Wisata\KunjunganController@index');
Route::get('kunjungan/{id}', 'Wisata\KunjunganController@getData');
Route::post('kunjungan', 'Wisata\KunjunganController@store');
Route::put('kunjungan/{id}', 'Wisata\KunjunganController@update');
Route::delete('kunjungan/{id}', 'Wisata\KunjunganController@delete');

// Data Kecamatan //
Route::get('kecamatan', 'Wisata\KecamatanController@index');
Route::get('kecamatan/{id}', 'Wisata\KecamatanController@getData');
Route::post('kecamatan', 'Wisata\KecamatanController@store');
Route::put('kecamatan/{id}', 'Wisata\KecamatanController@update');
Route::delete('kecamatan/{id}', 'Wisata\KecamatanController@delete');