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

Route::get('pesan-history', 'Ts\PesanController@historyPesan');
Route::get('rata2-nilai-dashboard', 'Ts\DashboardController@rata2Nilai');
Route::get('data-box', 'Ts\PesanController@getDataBox');

Route::get('kartu-piutang', 'Ts\DashSiswaController@getKartuPiutang');
Route::get('kartu-piutang-pdf', 'Ts\DashSiswaController@getKartuPiutangPDF');
Route::get('kartu-pdd', 'Ts\DashSiswaController@getKartuPDD');
Route::get('kartu-pdd-pdf', 'Ts\DashSiswaController@getKartuPDDPDF');
Route::get('dash-siswa-profile', 'Ts\DashSiswaController@getProfile');