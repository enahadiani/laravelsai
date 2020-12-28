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

Route::post('hrKaryawan-import', 'Yakes\HrKaryawanController@importExcel');
Route::get('hrKaryawan-tmp', 'Yakes\HrKaryawanController@getKaryawanTmp');
Route::post('hrKaryawan', 'Yakes\HrKaryawanController@store');

Route::post('dashPeserta-import', 'Yakes\PesertaController@importExcel');
Route::get('dashPeserta-tmp', 'Yakes\PesertaController@getPesertaTmp');
Route::post('dashPeserta', 'Yakes\PesertaController@store');

Route::post('dashKunjungan-import', 'Yakes\KunjunganController@importExcel');
Route::get('dashKunjungan-tmp', 'Yakes\KunjunganController@getKunjunganTmp');
Route::post('dashKunjungan', 'Yakes\KunjunganController@store');

Route::post('dashTopSix-import', 'Yakes\TopSixController@importExcel');
Route::get('dashTopSix-tmp', 'Yakes\TopSixController@getTopSixTmp');
Route::post('dashTopSix', 'Yakes\TopSixController@store');

Route::post('dashSDMCulture-import', 'Yakes\SDMCultureController@importExcel');
Route::get('dashSDMCulture-tmp', 'Yakes\SDMCultureController@getSDMCultureTmp');
Route::post('dashSDMCulture', 'Yakes\SDMCultureController@store');

Route::post('dashKontrakManage-import', 'Yakes\KontrakManagemenController@importExcel');
Route::get('dashKontrakManage-tmp', 'Yakes\KontrakManagemenController@getKontrakManagemenTmp');
Route::post('dashKontrakManage', 'Yakes\KontrakManagemenController@store');

Route::post('dashBinaSehat-import', 'Yakes\BinaSehatController@importExcel');
Route::get('dashBinaSehat-tmp', 'Yakes\BinaSehatController@getBinaSehatTmp');
Route::post('dashBinaSehat', 'Yakes\BinaSehatController@store');

Route::get('setting-grafik', 'Yakes\SettingGrafikController@index');
Route::get('setting-grafik-detail', 'Yakes\SettingGrafikController@show');
Route::post('setting-grafik', 'Yakes\SettingGrafikController@store');
Route::put('setting-grafik/{periode}', 'Yakes\SettingGrafikController@update');
Route::delete('setting-grafik', 'Yakes\SettingGrafikController@delete');
Route::get('setting-grafik-klp', 'Yakes\SettingGrafikController@getKlp');