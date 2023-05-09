<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('periode', 'DashItpln\DashboardController@getPeriode');
Route::get('laba-rugi-box', 'DashItpln\DashboardController@getLabaRugiBox');
Route::get('rasio-box', 'DashItpln\DashboardController@getRasioBox');
Route::get('arus-kas-chart', 'DashItpln\DashboardController@getArusKasChart');
Route::get('laba-rugi-chart', 'DashItpln\DashboardController@getLabaRugiChart');

?>