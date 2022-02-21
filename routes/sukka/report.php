<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('filter-lokasi','Sukka\FilterController@getFilterLokasi');
Route::get('filter-periode-juskeb','Sukka\FilterController@getFilterPeriodeJuskeb');
Route::get('filter-pp','Sukka\FilterController@getFilterPP');
Route::get('filter-bukti-juskeb','Sukka\FilterController@getFilterBuktiJuskeb');
Route::get('filter-default-juskeb','Sukka\FilterController@getFilterDefaultJuskeb');

Route::post('lap-posisi-juskeb','Sukka\LaporanController@getPosisiJuskeb');
Route::get('lap-posisi-juskeb-pdf','Sukka\LaporanController@getPosisiJuskebPDF');
Route::post('lap-aju-juskeb-form','Sukka\LaporanController@getAjuJuskebForm');
Route::post('lap-history-app-juskeb','Sukka\LaporanController@getHistoryAppJuskeb');