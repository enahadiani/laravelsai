<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Penjualan Routes //
Route::get('penjualan-open', 'Wisata\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Wisata\PenjualanController@cekBonus');
Route::post('penjualan', 'Wisata\PenjualanController@store');

//Open Kasir //
Route::get('open-kasir', 'Wisata\OpenKasirController@index');
Route::post('open-kasir', 'Wisata\OpenKasirController@store');
Route::put('open-kasir/{nik}/{no_open}', 'Wisata\OpenKasirController@update');

//Close Kasir //
Route::get('close-kasir-new', 'Wisata\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Wisata\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Wisata\CloseKasirController@getData');
Route::post('close-kasir', 'Wisata\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Wisata\PembelianController@index');
Route::get('pembelian-barang', 'Wisata\PembelianController@getBarang');
Route::post('pembelian', 'Wisata\PembelianController@store');
Route::put('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\PembelianController@delete');
Route::get('pembelian-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\PembelianController@show');

// Retur Pembelian //
Route::post('retur-beli', 'Wisata\ReturBeliController@store');
Route::get('retur-beli-new', 'Wisata\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Wisata\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\ReturBeliController@show');

// Stok Opname //
Route::get('stok-opname', 'Wisata\StokOpnameController@index');
// Route::get('retur-beli-new', 'Wisata\ReturBeliController@getNew');
// Route::get('retur-beli-finish', 'Wisata\ReturBeliController@getFinish');
// Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\ReturBeliController@getBarang');
// Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Wisata\ReturBeliController@show');

// Pemasukan Routes //
Route::get('pemasukan', 'Wisata\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Wisata\PemasukanController@show');
Route::post('pemasukan', 'Wisata\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Wisata\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Wisata\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Wisata\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Wisata\PengeluaranController@show');
Route::post('pengeluaran', 'Wisata\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Wisata\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Wisata\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Wisata\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Wisata\PindahBukuController@show');
Route::post('pindah-buku', 'Wisata\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Wisata\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Wisata\PindahBukuController@destroy');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Wisata\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Wisata\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Wisata\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Wisata\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Wisata\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Wisata\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Wisata\BarcodeController@loadData');
Route::get('periode', 'Wisata\BarcodeController@getPeriode');
Route::post('barcode', 'Wisata\BarcodeController@store');

Route::get('/jurnal', 'Wisata\JurnalController@index');
Route::post('/jurnal', 'Wisata\JurnalController@store');
Route::get('/jurnal/{id}', 'Wisata\JurnalController@show');
Route::put('/jurnal/{id}','Wisata\JurnalController@update');
Route::delete('/jurnal/{id}','Wisata\JurnalController@destroy');
Route::get('/pp', 'Wisata\JurnalController@getPP');
Route::get('/akun', 'Wisata\JurnalController@getAkun');
Route::get('/nikperiksa', 'Wisata\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Wisata\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Wisata\JurnalController@getPeriodeJurnal');
