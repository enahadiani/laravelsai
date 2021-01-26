<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Mutasi Routes //
Route::get('generate-mutasi', 'Esaku\MutasiController@generateKode');
Route::get('barang-mutasi-detail', 'Esaku\MutasiController@getBarangDetail');
Route::get('filter-barang-mutasi', 'Esaku\HelperController@getFilterMutasiBarang');
Route::get('filter-bukti-mutasi-kirim', 'Esaku\HelperController@getFilterBuktiMutasiKirim');
Route::get('filter-bukti-mutasi-terima', 'Esaku\HelperController@getFilterBuktiMutasiTerima');
Route::get('barang-mutasi-kirim', 'Esaku\MutasiController@getBarangMutasiKirim');
Route::get('mutasi-kirim', 'Esaku\MutasiController@getMutasiKirim');
Route::get('mutasi-terima', 'Esaku\MutasiController@getMutasiTerima');
Route::get('mutasi-detail', 'Esaku\MutasiController@show');
Route::post('mutasi-barang', 'Esaku\MutasiController@store');
Route::delete('mutasi-barang', 'Esaku\MutasiController@destroy');
Route::put('mutasi-barang-update', 'Esaku\MutasiController@update');

//Aktiva tetap //
Route::post('aktap', 'Esaku\TransAktivaTetapController@store');

//Penjualan Routes //
Route::get('penjualan-open', 'Esaku\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\PenjualanController@cekBonus');
Route::post('penjualan', 'Esaku\PenjualanController@store');
Route::get('nota', 'Esaku\PenjualanController@printNota');

//Open Kasir //
Route::get('open-kasir', 'Esaku\OpenKasirController@index');
Route::post('open-kasir', 'Esaku\OpenKasirController@store');
Route::put('open-kasir', 'Esaku\OpenKasirController@update');
Route::delete('open-kasir', 'Esaku\OpenKasirController@delete');

//Close Kasir //
Route::get('close-kasir-new', 'Esaku\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Esaku\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Esaku\CloseKasirController@getData');
Route::post('close-kasir', 'Esaku\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Esaku\PembelianController@index');
Route::get('pembelian-barang', 'Esaku\PembelianController@getBarang');
Route::post('pembelian', 'Esaku\PembelianController@store');
Route::put('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@delete');
Route::get('pembelian-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@show');
Route::get('pembelian-nota', 'Esaku\PembelianController@printNota');

// Retur Pembelian //
Route::post('retur-beli', 'Esaku\ReturBeliController@store');
Route::get('retur-beli-new', 'Esaku\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Esaku\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@show');

// Stok Opname //
Route::get('stok-opname', 'Esaku\StokOpnameController@index');
Route::get('stok-opname-detail', 'Esaku\StokOpnameController@show');
Route::get('stok-opname-exec', 'Esaku\StokOpnameController@execSP');
Route::get('stok-opname-load', 'Esaku\StokOpnameController@load');
Route::post('upload-barang-fisik', 'Esaku\StokOpnameController@importExcel');
Route::post('stok-opname-rekon', 'Esaku\StokOpnameController@storeRekon');
Route::post('stok-opname', 'Esaku\StokOpnameController@store');
Route::post('stok-opname-edit', 'Esaku\StokOpnameController@update');
Route::delete('stok-opname', 'Esaku\StokOpnameController@destroy');

// Pemasukan Routes //
Route::get('pemasukan', 'Esaku\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Esaku\PemasukanController@show');
Route::post('pemasukan', 'Esaku\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Esaku\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Esaku\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Esaku\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@show');
Route::post('pengeluaran', 'Esaku\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Esaku\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@show');
Route::post('pindah-buku', 'Esaku\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@destroy');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Esaku\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Esaku\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Esaku\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Esaku\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Esaku\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Esaku\BarcodeController@loadData');
Route::get('periode', 'Esaku\BarcodeController@getPeriode');
Route::post('barcode', 'Esaku\BarcodeController@store');

Route::get('/jurnal', 'Esaku\JurnalController@index');
Route::post('/jurnal', 'Esaku\JurnalController@store');
Route::get('/jurnal/{id}', 'Esaku\JurnalController@show');
Route::put('/jurnal/{id}','Esaku\JurnalController@update');
Route::delete('/jurnal/{id}','Esaku\JurnalController@destroy');
Route::get('/pp', 'Esaku\JurnalController@getPP');
Route::get('/akun', 'Esaku\JurnalController@getAkun');
Route::get('/nikperiksa', 'Esaku\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Esaku\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Esaku\JurnalController@getPeriodeJurnal');
Route::post('/import-excel', 'Esaku\JurnalController@importExcel');
Route::get('jurnal-tmp', 'Esaku\JurnalController@getJurnalTmp');


Route::get('kas-bank', 'Esaku\KasBankController@index');
Route::post('kas-bank', 'Esaku\KasBankController@store');
Route::get('kas-bank/{id}', 'Esaku\KasBankController@show');
Route::put('kas-bank/{id}','Esaku\KasBankController@update');
Route::delete('kas-bank/{id}','Esaku\KasBankController@destroy');
Route::post('kas-bank-import-excel', 'Esaku\KasBankController@importExcel');
Route::get('kas-bank-tmp', 'Esaku\KasBankController@getDataTmp');

Route::get('sync-master', 'Esaku\SyncController@getSyncMaster');
Route::post('sync-master', 'Esaku\SyncController@syncMaster');

Route::get('sync-pnj', 'Esaku\SyncController@getSyncPnj');
Route::get('sync-pnj-detail', 'Esaku\SyncController@getSyncPnjDetail');
Route::post('sync-pnj', 'Esaku\SyncController@syncPnj');

Route::get('sync-pmb', 'Esaku\SyncController@getSyncPmb');
Route::get('sync-pmb-detail', 'Esaku\SyncController@getSyncPmbDetail');
Route::post('sync-pmb', 'Esaku\SyncController@syncPmb');

Route::get('sync-retur-beli', 'Esaku\SyncController@getSyncReturBeli');
Route::get('sync-retur-beli-detail', 'Esaku\SyncController@getSyncReturBeliDetail');
Route::post('sync-retur-beli', 'Esaku\SyncController@syncReturBeli');

Route::get('modultrans', 'Esaku\PostingController@getModul');
Route::post('loadJurnal', 'Esaku\PostingController@loadJurnal');
Route::post('posting', 'Esaku\PostingController@store');
Route::post('unposting-jurnal', 'Esaku\UnPostingController@loadJurnal');
Route::post('unposting', 'Esaku\UnPostingController@store');

Route::get('jurnal-dok', 'Esaku\UploadDokJurnalController@show');
Route::post('jurnal-dok', 'Esaku\UploadDokJurnalController@store');
Route::delete('jurnal-dok', 'Esaku\UploadDokJurnalController@destroy');

//Closing Periode
Route::get('closing-periode','Esaku\ClosingPeriodeController@show');
Route::post('closing-periode','Esaku\ClosingPeriodeController@store');

Route::get('jurnal-penutup-list','Esaku\JurnalPenutupController@index');
Route::get('jurnal-penutup','Esaku\JurnalPenutupController@getDataAwal');
Route::post('jurnal-penutup','Esaku\JurnalPenutupController@store');

Route::post('sawal-upload', 'Esaku\SawalController@importExcel');
Route::get('sawal-load', 'Esaku\SawalController@getSawalTmp');
Route::post('sawal', 'Esaku\SawalController@store');