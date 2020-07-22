<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Kontrak
Route::get('kontrak','Sai\KontrakController@index');
Route::get('kontrak/{kode}','Sai\KontrakController@show');
Route::post('kontrak','Sai\KontrakController@store');
Route::put('kontrak-ubah/{kode}','Sai\KontrakController@update');
Route::delete('kontrak/{kode}','Sai\KontrakController@destroy'); 