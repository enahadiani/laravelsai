<?php

use Illuminate\Support\Facades\Route;


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
// Pertanggungan Beban
Route::get('/ptg-beban', 'Bdh\PtgBebanController@index');
Route::get('ptg-beban/{id}', 'Bdh\PtgBebanController@show');
Route::post('ptg-beban', 'Bdh\PtgBebanController@store');
Route::post('ptg-beban-ubah', 'Bdh\PtgBebanController@update');

Route::get('generate-bukti', 'Bdh\PtgBebanController@GenerateBukti');
Route::get('load-budget', 'Bdh\PtgBebanController@cekBudget');
Route::get('nik-buat', 'Bdh\PtgBebanController@getNikBuat');
Route::get('nik-tahu', 'Bdh\PtgBebanController@getNikTahu');
Route::get('nik-ver', 'Bdh\PtgBebanController@getNikVer');
Route::get('akun', 'Bdh\PtgBebanController@getAkun');
Route::get('pp', 'Bdh\PtgBebanController@getPP');
Route::get('drk', 'Bdh\PtgBebanController@getDrk');
Route::get('dok-jenis', 'Bdh\PtgBebanController@getJenis');



// SPB
Route::get('/spb', 'Bdh\SpbController@index');
Route::get('/spb-pb-list', 'Bdh\SpbController@getPb');
Route::get('/spb-rek-transfer', 'Bdh\SpbController@getTransfer');
Route::post('/spb', 'Bdh\SpbController@store');
Route::delete('/spb', 'Bdh\SpbController@destroy');


Route::get('spb-nobukti', 'Bdh\SpbController@GenerateBukti');
Route::get('spb-nik-bdh', 'Bdh\SpbController@getNikBdh');
Route::get('spb-nik-fiat', 'Bdh\SpbController@getNikFiat');
Route::get('spb-tambah-pb', 'Bdh\SpbController@getPbTambah');
Route::get('spb-store-pb', 'Bdh\SpbController@postPbTambah');


// Pembayaran SPB
Route::get('/bayar-spb', 'Bdh\PemSpbController@index');
Route::get('/bayar-spb-list', 'Bdh\PemSpbController@getPb');
Route::get('/bayar-spb-rek-transfer', 'Bdh\PemSpbController@getTransfer');
Route::get('/bayar-spb-nobukti', 'Bdh\PemSpbController@GenerateBukti');
Route::get('/bayar-spb-akun', 'Bdh\PemSpbController@getAkun');
Route::get('/bayar-spb-pp', 'Bdh\PemSpbController@getPP');
Route::get('/bayar-spb-akun-kasbank', 'Bdh\PemSpbController@getKasBank');

// Verifikasi Dokumen
Route::get('/ver-dok', 'Bdh\VerDokController@index');
Route::get('/ver-dok-nobukti', 'Bdh\VerDokController@generateKode');
Route::get('/ver-dok-pb', 'Bdh\VerDokController@getPb');
Route::get('/ver-dok-detail', 'Bdh\VerDokController@LoadData');
