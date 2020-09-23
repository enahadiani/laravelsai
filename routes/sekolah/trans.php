<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('siswa', 'Sekolah\SiswaController@index');
Route::get('siswa-detail', 'Sekolah\SiswaController@show');
Route::post('siswa', 'Sekolah\SiswaController@store');
Route::put('siswa', 'Sekolah\SiswaController@update');
Route::delete('siswa', 'Sekolah\SiswaController@destroy');
Route::get('siswa-param', 'Sekolah\SiswaController@getParam');
Route::get('siswa-periode', 'Sekolah\SiswaController@getPeriodeParam');

Route::get('penilaian', 'Sekolah\PenilaianController@index');
Route::get('penilaian-detail', 'Sekolah\PenilaianController@show');
Route::post('penilaian', 'Sekolah\PenilaianController@store');
Route::put('penilaian', 'Sekolah\PenilaianController@update');
Route::delete('penilaian', 'Sekolah\PenilaianController@destroy');
Route::get('penilaian-ke', 'Sekolah\PenilaianController@getPenilaianKe');
Route::post('import-excel', 'Sekolah\PenilaianController@importExcel');
Route::get('nilai-tmp', 'Sekolah\PenilaianController@getNilaiTmp');
Route::get('penilaian-dok', 'Sekolah\PenilaianController@showDokUpload');
Route::post('penilaian-dok', 'Sekolah\PenilaianController@storeDokumen');