<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Data//
Route::get('helper-akun', 'Yakes\HelperController@getAkun');
Route::get('cek-akun/{id}', 'Yakes\HelperController@cekAkun');

// Data Masakun //
Route::get('masakun', 'Yakes\MasakunController@index');
Route::get('masakun/{id}', 'Yakes\MasakunController@getData');
Route::post('masakun', 'Yakes\MasakunController@store');
Route::put('masakun/{id}', 'Yakes\MasakunController@update');
Route::delete('masakun/{id}', 'Yakes\MasakunController@delete');

// Data FS //
Route::get('fs', 'Yakes\FSController@index');
Route::get('fs/{id}', 'Yakes\FSController@getData');
Route::post('fs', 'Yakes\FSController@store');
Route::put('fs/{id}', 'Yakes\FSController@update');
Route::delete('fs/{id}', 'Yakes\FSController@delete');

// Data Flag Akun //
Route::get('flag-akun', 'Yakes\FlagAkunController@index');
Route::get('flag-akun/{id}', 'Yakes\FlagAkunController@getData');
Route::post('flag-akun', 'Yakes\FlagAkunController@store');
Route::put('flag-akun/{id}', 'Yakes\FlagAkunController@update');
Route::delete('flag-akun/{id}', 'Yakes\FlagAkunController@delete');

// Data Flag Relasi //
Route::get('flag-relasi', 'Yakes\FlagRelasiController@index');
Route::get('flag-akun/{id}', 'Yakes\FlagAkunController@getData');
Route::put('flag-relasi/{id}', 'Yakes\FlagRelasiController@update');
Route::delete('flag-relasi/{id}', 'Yakes\FlagRelasiController@delete');

// Tambahan //
Route::get('format-laporan','Yakes\FormatLaporanController@show');
Route::post('format-laporan','Yakes\FormatLaporanController@store');
Route::put('format-laporan','Yakes\FormatLaporanController@update');
Route::delete('format-laporan','Yakes\FormatLaporanController@destroy');
Route::get('format-laporan-versi','Yakes\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe','Yakes\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun','Yakes\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi','Yakes\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move','Yakes\FormatLaporanController@simpanMove');