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



Route::get('filter-pp', 'Siaga\FilterController@getFilterPP');
Route::get('filter-periode', 'Siaga\FilterController@getFilterPeriode');
Route::get('filter-bukti', 'Siaga\FilterController@getFilterNoBukti');

Route::post('lap-posisi', 'Siaga\LaporanController@getPosisi');
Route::post('lap-aju-form', 'Siaga\LaporanController@getAjuForm');
Route::post('lap-history-app', 'Siaga\LaporanController@getHistoryApp');