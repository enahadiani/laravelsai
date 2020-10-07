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

Route::get('filter-periode','Dago\FilterController@getFilterPeriode');
Route::get('filter-paket','Dago\FilterController@getFilterPaket');
Route::get('filter-jadwal','Dago\FilterController@getFilterJadwal');
Route::get('filter-noreg','Dago\FilterController@getFilterNoReg');
Route::get('filter-peserta','Dago\FilterController@getFilterPeserta');
Route::get('filter-kwitansi','Dago\FilterController@getFilterKwitansi');
Route::get('filter-jk','Dago\FilterController@getFilterJK');
Route::get('filter-terima','Dago\FilterController@getFilterTerima');
Route::get('filter-periode-bayar','Dago\FilterController@getFilterPeriodeBayar');

Route::get('filter2-periode','Dago\FilterController@getFilter2Periode');
Route::get('filter2-paket','Dago\FilterController@getFilter2Paket');
Route::get('filter2-jadwal','Dago\FilterController@getFilter2Jadwal');
Route::get('filter2-noreg','Dago\FilterController@getFilter2NoReg');
Route::get('filter2-peserta','Dago\FilterController@getFilter2Peserta');

//Pihak ketiga

//Laporan
Route::post('lap-mku-operasional','Dago\LaporanController@getMkuOperasional');
Route::post('lap-mku-keuangan','Dago\LaporanController@getMkuKeuangan');
Route::post('lap-paket','Dago\LaporanController@getPaket');
Route::post('lap-dokumen','Dago\LaporanController@getDokumen');
Route::post('lap-jamaah','Dago\LaporanController@getJamaah');

Route::post('lap-form-registrasi','Dago\LaporanController@getFormRegistrasi');
Route::post('lap-form-registrasi-baru','Dago\LaporanController@getFormRegistrasiBaru');
Route::post('lap-registrasi','Dago\LaporanController@getRegistrasi');
Route::post('lap-pembayaran','Dago\LaporanController@getPembayaran');
Route::post('lap-rekap-saldo','Dago\LaporanController@getRekapSaldo');
Route::post('lap-detail-saldo','Dago\LaporanController@getDetailSaldo');
Route::post('lap-detail-tagihan','Dago\LaporanController@getDetailTagihan');
Route::post('lap-detail-bayar','Dago\LaporanController@getDetailBayar');
Route::post('lap-kartu-pembayaran','Dago\LaporanController@getKartuPembayaran');
Route::post('lap-terima','Dago\LaporanController@getTerima');
Route::post('lap-jurnal','Dago\LaporanController@getJurnal');


