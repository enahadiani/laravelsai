<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Filter Controller//
Route::get('filter-periode-keu', 'Rtrw\FilterController@getFilterPeriodeKeuangan');
Route::get('filter-modul', 'Rtrw\FilterController@getFilterModul');
Route::get('filter-bukti-trans', 'Rtrw\FilterController@getFilterBuktiTrans');

Route::post('lap-bukti-trans', 'Rtrw\LaporanController@getBuktiTrans');
Route::post('lap-saldo', 'Rtrw\LaporanController@getSaldo');
Route::post('lap-kartu-iuran', 'Rtrw\LaporanController@getKartuIuran');

Route::get('lap-bukti-trans-pdf', 'Rtrw\LaporanController@getBuktiTransPDF');
Route::get('lap-saldo-pdf', 'Rtrw\LaporanController@getSaldorPDF');
Route::get('lap-kartu-iuran-pdf', 'Rtrw\LaporanController@getKartuIuranPDF');

Route::post('send-email-report', 'Rtrw\LaporanController@sendEmail');
