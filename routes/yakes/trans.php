<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Jurnal Sesuai //
Route::get('jurnal-sesuai', 'Yakes\JurnalSesuaiController@index');
Route::get('jurnal-sesuai/{id}', 'Yakes\JurnalSesuaiController@getData');
Route::post('jurnal-sesuai', 'Yakes\JurnalSesuaiController@store');
Route::put('jurnal-sesuai/{id}', 'Yakes\JurnalSesuaiController@update');
Route::delete('jurnal-sesuai/{id}', 'Yakes\JurnalSesuaiController@delete');