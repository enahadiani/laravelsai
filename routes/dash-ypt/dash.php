<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('data-fp-box', 'DashYpt\DashboardFPController@getDataBoxFirst');
Route::get('data-fp-pdpt', 'DashYpt\DashboardFPController@getDataBoxPdpt');
Route::get('data-fp-beban', 'DashYpt\DashboardFPController@getDataBoxBeban');
Route::get('data-fp-shu', 'DashYpt\DashboardFPController@getDataBoxShu');
Route::get('data-fp-or', 'DashYpt\DashboardFPController@getDataBoxShu');
Route::get('data-fp-lr', 'DashYpt\DashboardFPController@getDataBoxLabaRugi');
Route::get('data-fp-pl', 'DashYpt\DashboardFPController@getDataBoxPerformLembaga');

Route::get('data-fp-detail-perform', 'DashYpt\DashboardFPController@getDataPerformansiLembaga');
Route::get('data-fp-detail-lembaga', 'DashYpt\DashboardFPController@getDataPerLembaga');
Route::get('data-fp-detail-kelompok', 'DashYpt\DashboardFPController@getDataPerKelompok');

?>