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
Route::get('summary','Siaga\DashboardController@getSummary');
Route::get('dept','Siaga\DashboardController@getDept');
Route::get('periode','Siaga\DashboardController@getPeriode');
Route::get('dataof-modul','Siaga\DashboardController@getDataOfModul');
Route::get('data-other','Siaga\DashboardController@getDataOther');

//Financial Performance
Route::get('data-fp-box', 'Siaga\DashboardFPController@getDataBox');