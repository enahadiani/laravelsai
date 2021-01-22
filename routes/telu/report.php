<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-akun', 'DashTelu\FilterController@getFilterAkun');
Route::get('filter-periode-keu', 'DashTelu\FilterController@getFilterPeriodeKeuangan');
Route::get('filter-fs', 'DashTelu\FilterController@getFilterFS');
Route::get('filter-level', 'DashTelu\FilterController@getFilterLevel');
Route::get('filter-format', 'DashTelu\FilterController@getFilterFormat');
Route::get('filter-sumju', 'DashTelu\FilterController@getFilterSumju');
Route::get('filter-modul', 'DashTelu\FilterController@getFilterModul');
Route::get('filter-bukti-jurnal', 'DashTelu\FilterController@getFilterBuktiJurnal');
Route::get('filter-mutasi', 'DashTelu\FilterController@getFilterMutasi');
Route::get('filter-pp', 'DashTelu\FilterController@getFilterPP');
Route::get('filter-rektor', 'DashTelu\FilterController@getFilterRektor');
Route::get('filter-output', 'DashTelu\FilterController@getFilterOutput');

Route::post('lap-labarugi-agg', 'DashTelu\LaporanController@getLabaRugiAgg');
Route::post('lap-labarugi-agg-detail', 'DashTelu\LaporanController@getLabaRugiAggDetail');
Route::post('lap-neraca2', 'DashTelu\LaporanController@getNeraca2');
Route::post('lap-neraca2-detail', 'DashTelu\LaporanController@getNeraca2Detail');
Route::post('lap-investasi', 'DashTelu\LaporanController@getInvestasi');
Route::post('lap-labarugi-agg-dir', 'DashTelu\LaporanController@getLabaRugiAggDir');
Route::post('lap-labarugi-agg-dir-detail', 'DashTelu\LaporanController@getLabaRugiAggDirDetail');
Route::post('lap-labarugi-agg-fak', 'DashTelu\LaporanController@getLabaRugiAggFak');
Route::post('lap-labarugi-agg-prodi', 'DashTelu\LaporanController@getLabaRugiAggProdi');