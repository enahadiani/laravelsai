<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Master Karyawan
Route::get('karyawan','Sai\KaryawanController@index');
Route::get('karyawan/{kode}','Sai\KaryawanController@show');
Route::post('karyawan','Sai\KaryawanController@store');
Route::post('karyawan-ubah/{kode}','Sai\KaryawanController@update');
Route::delete('karyawan/{kode}','Sai\KaryawanController@destroy');

//Master Customer
Route::get('customer','Sai\CustomerController@index');
Route::get('customer/{kode}','Sai\CustomerController@show');
Route::post('customer','Sai\CustomerController@store');
Route::post('customer-ubah/{kode}','Sai\CustomerController@update');
Route::delete('customer/{kode}','Sai\CustomerController@destroy');