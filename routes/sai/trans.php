<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Kontrak
Route::get('kontrak','Sai\KontrakController@index');
Route::get('kontrak/{kode}','Sai\KontrakController@show');
Route::post('kontrak','Sai\KontrakController@store');
Route::put('kontrak-ubah/{kode}','Sai\KontrakController@update');
Route::delete('kontrak/{kode}','Sai\KontrakController@destroy');

//Tagihan
Route::get('tagihan','Sai\TagihanController@index');
Route::get('tagihan/{kode}','Sai\TagihanController@show');
Route::post('tagihan','Sai\TagihanController@store');
Route::post('tagihan-ubah/{kode}','Sai\TagihanController@update');
Route::delete('tagihan/{kode}','Sai\TagihanController@destroy');