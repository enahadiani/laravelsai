<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Master Karyawan
Route::get('karyawan','Sai\KaryawanController@index');
Route::get('karyawan/{kode}','Sai\KaryawanController@show');
Route::post('karyawan','Sai\KaryawanController@store');
Route::post('karyawan-ubah/{kode}','Sai\KaryawanController@update');
Route::delete('karyawan/{kode}','Sai\KaryawanController@destroy');