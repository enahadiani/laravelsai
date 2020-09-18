<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('pp', 'Sekolah\PPController@getPP');
Route::get('tingkatan', 'Sekolah\TingkatanController@getTingkatan');
Route::get('nik-guru/{kode_pp}', 'Sekolah\GuruController@getNIKGuru');

Route::get('tahun-ajaran', 'Sekolah\TahunAjaranController@index');
Route::get('tahun-ajaran-detail', 'Sekolah\TahunAjaranController@show');
Route::post('tahun-ajaran', 'Sekolah\TahunAjaranController@store');
Route::put('tahun-ajaran', 'Sekolah\TahunAjaranController@update');
Route::delete('tahun-ajaran', 'Sekolah\TahunAjaranController@destroy');

Route::get('angkatan', 'Sekolah\AngkatanController@index');
Route::get('angkatan-detail', 'Sekolah\AngkatanController@show');
Route::post('angkatan', 'Sekolah\AngkatanController@store');
Route::put('angkatan', 'Sekolah\AngkatanController@update');
Route::delete('angkatan', 'Sekolah\AngkatanController@destroy');

Route::get('jurusan', 'Sekolah\JurusanController@index');
Route::get('jurusan-detail', 'Sekolah\JurusanController@show');
Route::post('jurusan', 'Sekolah\JurusanController@store');
Route::put('jurusan', 'Sekolah\JurusanController@update');
Route::delete('jurusan', 'Sekolah\JurusanController@destroy');