<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-akun', 'Yakes\HelperController@getFilterAkun');
Route::get('filter-periode-keu', 'Yakes\HelperController@getFilterPeriodeKeuangan');
Route::get('filter-fs', 'Yakes\HelperController@getFilterFS');
Route::get('filter-level', 'Yakes\HelperController@getFilterLevel');
Route::get('filter-format', 'Yakes\HelperController@getFilterFormat');
Route::get('filter-sumju', 'Yakes\HelperController@getFilterSumju');
Route::get('filter-modul', 'Yakes\HelperController@getFilterModul');
Route::get('filter-bukti-jurnal', 'Yakes\HelperController@getFilterBuktiJurnal');
Route::get('filter-mutasi', 'Yakes\HelperController@getFilterMutasi');
Route::get('filter-pp', 'Yakes\HelperController@getFilterPP');
Route::get('filter-output', 'Yakes\HelperController@getFilterOutput');

Route::post('lap-nrclajur', 'Yakes\LaporanController@getNrcLajur');
Route::post('lap-nrclajur-grid', 'Yakes\LaporanController@getNrcLajurGrid');
Route::post('lap-nrclajur-jejer', 'Yakes\LaporanController@getNrcLajurJejer');
Route::post('lap-jurnal', 'Yakes\LaporanController@getJurnal');
Route::post('lap-buktijurnal', 'Yakes\LaporanController@getBuktiJurnal');
Route::post('lap-bukubesar', 'Yakes\LaporanController@getBukuBesar');
Route::post('lap-neraca', 'Yakes\LaporanController@getNeraca');
Route::post('lap-neraca-pp', 'Yakes\LaporanController@getNeracaPP');
Route::post('lap-neraca-jejer', 'Yakes\LaporanController@getNeracaJejer');
Route::post('lap-labarugi', 'Yakes\LaporanController@getLabaRugi');
Route::post('lap-labarugi-pp', 'Yakes\LaporanController@getLabaRugiPP');
Route::post('lap-labarugi-jejer', 'Yakes\LaporanController@getLabaRugiJejer');
Route::post('send-laporan', 'Yakes\LaporanController@sendMail');

Route::get('lap-nrclajur-pdf','Yakes\LaporanController@getNrcLajurPDF');
Route::get('lap-jurnal-pdf','Yakes\LaporanController@getJurnalPDF');
Route::get('lap-bukubesar-pdf','Yakes\LaporanController@getBukuBesarPDF');
Route::get('lap-labarugi-pdf','Yakes\LaporanController@getLabaRugiPDF');
Route::get('lap-neraca-pdf','Yakes\LaporanController@getNeracaPDF');
Route::get('lap-labarugi-area-pdf','Yakes\LaporanController@getLabaRugiPPPDF');
Route::get('lap-labarugi-jejer-pdf','Yakes\LaporanController@getLabaRugiJejerPDF');
Route::get('lap-neraca-area-pdf','Yakes\LaporanController@getNeracaPPPDF');
Route::get('lap-neraca-jejer-pdf','Yakes\LaporanController@getNeracaJejerPDF');
Route::get('lap-nrclajur-jejer-pdf','Yakes\LaporanController@getNrcLajurJejerPDF');

Route::get('lap-neraca-jamkespen-pdf', 'Yakes\LaporanController@getNeracaJamkespenPDF');

Route::post('lap-neraca-jamkespen', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-perubahan-aset-neto', 'Yakes\LaporanController@getPerubahanAsetNeto');
Route::post('lap-aset-neto', 'Yakes\LaporanController@getAsetNeto');
Route::post('lap-arus-kas', 'Yakes\LaporanController@getArusKas');
Route::post('lap-premi-bpjs', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-claim-bpjs', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-utilisasi-bpjs', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-rekap-real', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-rekap-real-grid', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-real-beban', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-claim-cost', 'Yakes\LaporanController@getNeracaJamkespen');

Route::post('lap-kepesertaan', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-bina-sehat', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-top-six', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-sdm-culture', 'Yakes\LaporanController@getNeracaJamkespen');
Route::post('lap-kontrak-manajemen', 'Yakes\LaporanController@getNeracaJamkespen');
