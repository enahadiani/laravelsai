<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Konten //
Route::get('konten', 'AdmGinas\KontenController@index');
Route::get('konten/{id}', 'AdmGinas\KontenController@getData');
Route::post('konten', 'AdmGinas\KontenController@store');
Route::put('konten/{id}', 'AdmGinas\KontenController@update');
Route::delete('konten/{id}', 'AdmGinas\KontenController@delete');
Route::get('konten-header', 'AdmGinas\KontenController@getHeader');
Route::get('konten-klp', 'AdmGinas\KontenController@getKlp');
Route::get('konten-kategori', 'AdmGinas\KontenController@getKategori');
