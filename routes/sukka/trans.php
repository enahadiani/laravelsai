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
Route::get('juskeb/{no_bukti}','Sukka\PengajuanJuskebController@show');
Route::post('juskeb','Sukka\PengajuanJuskebController@store');
Route::put('juskeb/{no_bukti}','Sukka\PengajuanJuskebController@update');
Route::delete('juskeb/{no_bukti}','Sukka\PengajuanJuskebController@destroy');
Route::get('juskeb-preview/{no_bukti}','Sukka\PengajuanJuskebController@getPreview');

Route::post('send-email','Sukka\PengajuanJuskebController@sendEmail');

Route::get('app-juskeb','Sukka\ApprovalJuskebController@index');
Route::get('app-juskeb-aju','Sukka\ApprovalJuskebController@getPengajuan');
Route::get('app-juskeb-detail','Sukka\ApprovalJuskebController@show');
Route::post('app-juskeb','Sukka\ApprovalJuskebController@store');
Route::get('app-juskeb-status','Sukka\ApprovalJuskebController@getStatus');
Route::get('app-juskeb-preview','Sukka\ApprovalJuskebController@getPreview');
Route::post('app-juskeb-send-email','Sukka\ApprovalJuskebController@sendEmail');