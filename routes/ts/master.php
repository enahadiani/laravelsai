<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('tahun-ajaran', 'Ts\TahunAjaranController@index');

Route::post('/sis-hakakses-list', 'Ts\SisHakaksesController@index');
Route::get('/sis-hakakses-pp', 'Ts\SisHakaksesController@getPP');
Route::post('/sis-hakakses', 'Ts\SisHakaksesController@store');
Route::get('/sis-hakakses/{nik}', 'Ts\SisHakaksesController@show');
Route::post('/sis-hakakses/{nik}','Ts\SisHakaksesController@update');
Route::delete('/sis-hakakses/{nik}','Ts\SisHakaksesController@destroy');
Route::get('/sis-hakakses-nik', 'Ts\SisHakaksesController@getNIK');
Route::get('/sis-hakakses-form', 'Ts\SisHakaksesController@getForm');
Route::get('/sis-hakakses-menu', 'Ts\SisHakaksesController@getMenu');