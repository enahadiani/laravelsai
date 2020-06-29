<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper 
Route::get('jenis-iuran','Rtrw\HelperController@getJenisIuran');
Route::get('masakun-curr','Rtrw\HelperController@getCurr');
Route::get('masakun-modul','Rtrw\HelperController@getModul');
Route::get('reftrans-kode/{jenis}','Rtrw\HelperController@getRef');

//Master Satpam
Route::get('satpam','Rtrw\SatpamController@index');
Route::post('satpam','Rtrw\SatpamController@store');
Route::get('satpam/{id_satpam}','Rtrw\SatpamController@show');
Route::post('satpam/{id_satpam}','Rtrw\SatpamController@update');
Route::delete('satpam/{id_satpam}','Rtrw\SatpamController@destroy');
Route::post('satpam-generate-qrcode','Rtrw\SatpamController@generateQrCode');

//Master Blok
Route::get('blok','Rtrw\BlokController@index');
Route::get('blok/{blok}','Rtrw\BlokController@show');
Route::post('blok','Rtrw\BlokController@store');
Route::put('blok/{blok}','Rtrw\BlokController@update');
Route::delete('blok/{blok}','Rtrw\BlokController@destroy');

//Master PP
Route::get('pp','Rtrw\PpController@index');
Route::get('pp/{kode_pp}','Rtrw\PpController@show');
Route::post('pp','Rtrw\PpController@store');
Route::put('pp/{kode_pp}','Rtrw\PpController@update');
Route::delete('pp/{kode_pp}','Rtrw\PpController@destroy');

//Master Perlu
Route::get('perlu','Rtrw\KeperluanController@index');
Route::get('perlu/{kode_perlu}','Rtrw\KeperluanController@show');
Route::post('perlu','Rtrw\KeperluanController@store');
Route::put('perlu/{kode_perlu}','Rtrw\KeperluanController@update');
Route::delete('perlu/{kode_perlu}','Rtrw\KeperluanController@destroy');

//Master Rumah
Route::get('rumah','Rtrw\RumahController@index');
Route::get('rumah/{kode_rumah}','Rtrw\RumahController@show');
Route::post('rumah','Rtrw\RumahController@store');
Route::put('rumah/{kode_rumah}','Rtrw\RumahController@update');
Route::delete('rumah/{kode_rumah}','Rtrw\RumahController@destroy');

//Master Warga
Route::get('warga','Rtrw\WargaController@index');
Route::get('warga-detail/{no_bukti}','Rtrw\WargaController@show');
Route::post('warga','Rtrw\WargaController@store');
Route::post('warga/{no_bukti}','Rtrw\WargaController@update');
Route::delete('warga/{no_bukti}','Rtrw\WargaController@destroy');

//Master Akun
Route::get('masakun','Rtrw\MasakunController@index');
Route::get('masakun-detail/{kode}','Rtrw\MasakunController@show');
Route::post('masakun','Rtrw\MasakunController@store');
Route::put('masakun/{kode}','Rtrw\MasakunController@update');
Route::delete('masakun/{kode}','Rtrw\MasakunController@destroy');

//Master Relasi
Route::get('relakun-pp','Rtrw\RelakunPPController@index');
Route::get('relakun-pp-detail/{kode}','Rtrw\RelakunPPController@show');
Route::post('relakun-pp','Rtrw\RelakunPPController@store');
Route::put('relakun-pp/{kode}','Rtrw\RelakunPPController@update');
Route::delete('relakun-pp/{kode}','Rtrw\RelakunPPController@destroy');

//Master Referensi
Route::get('reftrans','Rtrw\ReferensiTransController@index');
Route::get('reftrans-detail/{kode}','Rtrw\ReferensiTransController@show');
Route::post('reftrans','Rtrw\ReferensiTransController@store');
Route::put('reftrans/{kode}','Rtrw\ReferensiTransController@update');
Route::delete('reftrans/{kode}','Rtrw\ReferensiTransController@destroy');

//Setting Saldo awal
Route::get('setting-saldo-awal','Rtrw\SaldoController@index');
// Route::get('reftrans-detail/{kode}','Rtrw\ReferensiTransController@show');
Route::post('setting-saldo-awal','Rtrw\SaldoController@store');
Route::put('setting-saldo-awal/{kode}/{pp}/{periode}','Rtrw\SaldoController@update');
Route::delete('setting-saldo-awal/{kode}/{pp}/{periode}','Rtrw\SaldoController@destroy');

//Generate iuran
Route::post('generate-iuran','Rtrw\IuranController@store');
