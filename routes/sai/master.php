<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper
Route::get('user-menu','Sai\HelperController@getMenu');

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

//Master Proyek
Route::get('proyek','Sai\ProyekController@index');
Route::get('proyek/{kode}','Sai\ProyekController@show');
Route::post('proyek','Sai\ProyekController@store');
Route::put('proyek-ubah/{kode}','Sai\ProyekController@update');
Route::delete('proyek/{kode}','Sai\ProyekController@destroy'); 

//Master User
Route::get('user','Sai\UserController@index');
Route::get('user-detail/{kode}','Sai\UserController@show');
Route::post('user','Sai\UserController@store');
Route::put('user-ubah/{kode}','Sai\UserController@update');
Route::delete('user/{kode}','Sai\UserController@destroy');

//Master User
Route::get('konten-ktg','Sai\KategoriKontenController@index');
Route::get('konten-ktg/{kode}','Sai\KategoriKontenController@show');
Route::post('konten-ktg','Sai\KategoriKontenController@store');
Route::put('konten-ktg/{kode}','Sai\KategoriKontenController@update');
Route::delete('konten-ktg/{kode}','Sai\KategoriKontenController@destroy');