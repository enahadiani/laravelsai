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

Route::get('juskeb-pp','Sukka\PengajuanJuskebController@getPP');
Route::get('juskeb-jenis','Sukka\PengajuanJuskebController@getJenis');
Route::get('juskeb-app-flow','Sukka\PengajuanJuskebController@getAppFlow');
Route::get('juskeb','Sukka\PengajuanJuskebController@index');
Route::get('juskeb-detail','Sukka\PengajuanJuskebController@show');
Route::post('juskeb','Sukka\PengajuanJuskebController@store');
Route::put('juskeb','Sukka\PengajuanJuskebController@update');
Route::delete('juskeb/{no_bukti}','Sukka\PengajuanJuskebController@destroy');

Route::post('send-email','Sukka\PengajuanJuskebController@sendEmail');