<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Jurnal Sesuai //
Route::get('jurnal-sesuai', 'Yakes\JurnalSesuaiController@index');
Route::get('jurnal-sesuai/{id}', 'Yakes\JurnalSesuaiController@getData');
Route::post('jurnal-sesuai', 'Yakes\JurnalSesuaiController@store');
Route::put('jurnal-sesuai/{id}/{periode}', 'Yakes\JurnalSesuaiController@update');
Route::delete('jurnal-sesuai/{id}', 'Yakes\JurnalSesuaiController@delete');

Route::get('periode', 'Yakes\TransferDataController@getPeriode');
Route::post('transfer-data', 'Yakes\TransferDataController@store');

Route::get('tahun', 'Yakes\AnggaranController@getTahun');
Route::get('anggaran', 'Yakes\AnggaranController@index');
Route::post('anggaran-upload', 'Yakes\AnggaranController@importExcel');
Route::get('anggaran-load', 'Yakes\AnggaranController@loadAnggaran');
Route::post('anggaran', 'Yakes\AnggaranController@store');