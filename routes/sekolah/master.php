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