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

// PENGAJUAN RRA
Route::get('aju-rra-nobukti', 'Sukka\PengajuanRRAController@generateNoBukti');
Route::get('aju-rra', 'Sukka\PengajuanRRAController@index');
Route::post('aju-rra', 'Sukka\PengajuanRRAController@store');
Route::get('aju-rra/{id}', 'Sukka\PengajuanRRAController@show');
Route::post('aju-rra/{id}','Sukka\PengajuanRRAController@update');
Route::delete('aju-rra/{id}','Sukka\PengajuanRRAController@destroy');
Route::get('aju-rra-pp', 'Sukka\PengajuanRRAController@getPP');
Route::get('aju-rra-drk', 'Sukka\PengajuanRRAController@getDRK');
Route::get('aju-rra-drk-beri', 'Sukka\PengajuanRRAController@getDRKPemberi');
Route::get('aju-rra-jenis-dok', 'Sukka\PengajuanRRAController@getJenisDok');
Route::get('aju-rra-akun', 'Sukka\PengajuanRRAController@getAkun');
Route::get('aju-rra-lokasi', 'Sukka\PengajuanRRAController@getLokasi');
Route::get('aju-rra-nik-app', 'Sukka\PengajuanRRAController@getNIKApp');
Route::post('aju-rra-excel', 'Sukka\PengajuanRRAController@importExcel');
Route::get('aju-rra-tmp', 'Sukka\PengajuanRRAController@getTmp');
Route::post('aju-rra-cek-budget', 'Sukka\PengajuanRRAController@cekBudget');
Route::get('aju-rra-saldo', 'Sukka\PengajuanRRAController@getSaldo');
Route::get('aju-rra-flow','Sukka\PengajuanRRAController@getAppFlow');