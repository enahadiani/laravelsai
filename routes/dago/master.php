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

//Helper Controller//
Route::get('akun-pdpt', 'Dago\HelperController@getAkunPdpt');

//Jenis Pekerjaan //
Route::get('pekerjaan', 'Dago\PekerjaanController@index');
Route::get('pekerjaan/{id}', 'Dago\PekerjaanController@getData');
Route::post('pekerjaan', 'Dago\PekerjaanController@store');
Route::put('pekerjaan/{id}', 'Dago\PekerjaanController@update');
Route::delete('pekerjaan/{id}', 'Dago\PekerjaanController@delete');

//Jenis Harga //
Route::get('jenis-harga', 'Dago\JenisHargaController@index');
Route::get('jenis-harga/{id}', 'Dago\JenisHargaController@getData');
Route::post('jenis-harga', 'Dago\JenisHargaController@store');
Route::put('jenis-harga/{id}', 'Dago\JenisHargaController@update');
Route::delete('jenis-harga/{id}', 'Dago\JenisHargaController@delete');

//Type Room //
Route::get('type-room', 'Dago\TypeRoomController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Biaya //
Route::get('biaya', 'Dago\BiayaWajibController@index');
Route::get('biaya/{id}', 'Dago\BiayaWajibController@getData');
Route::post('biaya', 'Dago\BiayaWajibController@store');
Route::put('biaya/{id}', 'Dago\BiayaWajibController@update');
Route::delete('biaya/{id}', 'Dago\BiayaWajibController@delete');

//Marketing //
Route::get('marketing', 'Dago\MarketingController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Agen //
Route::get('agen', 'Dago\AgenController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Produk //
Route::get('produk', 'Dago\ProdukController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Master Dokumen //
Route::get('master-dokumen', 'Dago\MasterDokumenController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Paket //
Route::get('paket', 'Dago\PaketController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');

//Jadwal //
Route::get('jadwal', 'Dago\JadwalController@index');
Route::get('type-room/{id}', 'Dago\TypeRoomController@getData');
Route::post('type-room', 'Dago\TypeRoomController@store');
Route::put('type-room/{id}', 'Dago\TypeRoomController@update');
Route::delete('type-room/{id}', 'Dago\TypeRoomController@delete');