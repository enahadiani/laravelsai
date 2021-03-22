<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Mutasi Routes //
Route::get('generate-mutasi', 'Esaku\Inventori\MutasiController@generateKode');
Route::get('barang-mutasi-detail', 'Esaku\Inventori\MutasiController@getBarangDetail');
Route::get('filter-barang-mutasi', 'Esaku\HelperController@getFilterMutasiBarang');
Route::get('filter-bukti-mutasi-kirim', 'Esaku\HelperController@getFilterBuktiMutasiKirim');
Route::get('filter-bukti-mutasi-terima', 'Esaku\HelperController@getFilterBuktiMutasiTerima');
Route::get('barang-mutasi-kirim', 'Esaku\Inventori\MutasiController@getBarangMutasiKirim');
Route::get('mutasi-kirim', 'Esaku\Inventori\MutasiController@getMutasiKirim');
Route::get('mutasi-terima', 'Esaku\Inventori\MutasiController@getMutasiTerima');
Route::get('mutasi-detail', 'Esaku\Inventori\MutasiController@show');
Route::post('mutasi-barang', 'Esaku\Inventori\MutasiController@store');
Route::delete('mutasi-barang', 'Esaku\Inventori\MutasiController@destroy');
Route::put('mutasi-barang-update', 'Esaku\Inventori\MutasiController@update');

Route::post('send-whatsapp', 'Esaku\Setting\WAController@sendMessage');
Route::post('pooling', 'Esaku\Setting\WAController@storePooling');
Route::post('jurnal-notifikasi', 'Esaku\Keuangan\JurnalController@sendNotifikasi');

//Aktiva tetap //
Route::post('aktap', 'Esaku\Aktap\TransAktivaTetapController@store');

//Penjualan Routes //
Route::get('penjualan-open', 'Esaku\Inventori\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\PenjualanController@cekBonus');
Route::post('penjualan', 'Esaku\Inventori\PenjualanController@store');
Route::get('nota', 'Esaku\Inventori\PenjualanController@printNota');

//Open Kasir //
Route::get('open-kasir', 'Esaku\Inventori\OpenKasirController@index');
Route::post('open-kasir', 'Esaku\Inventori\OpenKasirController@store');
Route::put('open-kasir', 'Esaku\Inventori\OpenKasirController@update');
Route::delete('open-kasir', 'Esaku\Inventori\OpenKasirController@delete');

//Close Kasir //
Route::get('close-kasir-new', 'Esaku\Inventori\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Esaku\Inventori\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Esaku\Inventori\CloseKasirController@getData');
Route::post('close-kasir', 'Esaku\Inventori\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Esaku\Inventori\PembelianController@index');
Route::get('pembelian-barang', 'Esaku\Inventori\PembelianController@getBarang');
Route::post('pembelian', 'Esaku\Inventori\PembelianController@store');
Route::put('pembelian-update', 'Esaku\Inventori\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\PembelianController@delete');
Route::get('pembelian-detail', 'Esaku\Inventori\PembelianController@show');
Route::get('pembelian-nota', 'Esaku\Inventori\PembelianController@printNota');
Route::get('pembelian-data-nota', 'Esaku\Inventori\PembelianController@getDataNota');

// Retur Pembelian //
Route::post('retur-beli', 'Esaku\Inventori\ReturBeliController@store');
Route::delete('retur-beli', 'Esaku\Inventori\ReturBeliController@delete');
Route::get('retur-beli-new', 'Esaku\Inventori\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Esaku\Inventori\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\Inventori\ReturBeliController@show');

// Stok Opname //
Route::get('stok-opname', 'Esaku\Inventori\StokOpnameController@index');
Route::get('stok-opname-detail', 'Esaku\Inventori\StokOpnameController@show');
Route::get('stok-opname-exec', 'Esaku\Inventori\StokOpnameController@execSP');
Route::get('stok-opname-load', 'Esaku\Inventori\StokOpnameController@load');
Route::post('upload-barang-fisik', 'Esaku\Inventori\StokOpnameController@importExcel');
Route::post('stok-opname-rekon', 'Esaku\Inventori\StokOpnameController@storeRekon');
Route::post('stok-opname', 'Esaku\Inventori\StokOpnameController@store');
Route::post('stok-opname-edit', 'Esaku\Inventori\StokOpnameController@update');
Route::delete('stok-opname', 'Esaku\Inventori\StokOpnameController@destroy');

// Pemasukan Routes //
Route::get('pemasukan', 'Esaku\KasBank\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@show');
Route::post('pemasukan', 'Esaku\KasBank\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Esaku\KasBank\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Esaku\KasBank\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@show');
Route::post('pengeluaran', 'Esaku\KasBank\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Esaku\KasBank\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Esaku\KasBank\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@show');
Route::post('pindah-buku', 'Esaku\KasBank\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Esaku\KasBank\PindahBukuController@destroy');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\Inventori\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Esaku\Inventori\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Esaku\Inventori\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Esaku\Inventori\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Esaku\Inventori\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Esaku\Inventori\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Esaku\Inventori\BarcodeController@loadData');
Route::get('periode', 'Esaku\Inventori\BarcodeController@getPeriode');
Route::post('barcode', 'Esaku\Inventori\BarcodeController@store');

Route::get('/jurnal', 'Esaku\Keuangan\JurnalController@index');
Route::post('/jurnal', 'Esaku\Keuangan\JurnalController@store');
Route::get('/jurnal/{id}', 'Esaku\Keuangan\JurnalController@show');
Route::post('/jurnal/{id}','Esaku\Keuangan\JurnalController@update');
Route::delete('/jurnal/{id}','Esaku\Keuangan\JurnalController@destroy');
Route::get('/pp', 'Esaku\Keuangan\JurnalController@getPP');
Route::get('/akun', 'Esaku\Keuangan\JurnalController@getAkun');
Route::get('/nikperiksa', 'Esaku\Keuangan\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Esaku\Keuangan\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Esaku\Keuangan\JurnalController@getPeriodeJurnal');
Route::post('/import-excel', 'Esaku\Keuangan\JurnalController@importExcel');
Route::get('jurnal-tmp', 'Esaku\Keuangan\JurnalController@getJurnalTmp');


Route::get('kas-bank', 'Esaku\KasBank\KasBankController@index');
Route::post('kas-bank', 'Esaku\KasBank\KasBankController@store');
Route::get('kas-bank/{id}', 'Esaku\KasBank\KasBankController@show');
Route::put('kas-bank/{id}','Esaku\KasBank\KasBankController@update');
Route::delete('kas-bank/{id}','Esaku\KasBank\KasBankController@destroy');
Route::post('kas-bank-import-excel', 'Esaku\KasBank\KasBankController@importExcel');
Route::get('kas-bank-tmp', 'Esaku\KasBank\KasBankController@getDataTmp');

Route::get('uang-masuk', 'Esaku\KasBank\UangMasukController@index');
Route::post('uang-masuk', 'Esaku\KasBank\UangMasukController@store');
Route::get('uang-masuk/{id}', 'Esaku\KasBank\UangMasukController@show');
Route::post('uang-masuk/{id}','Esaku\KasBank\UangMasukController@update');
Route::delete('uang-masuk/{id}','Esaku\KasBank\UangMasukController@destroy');
Route::post('uang-masuk-import-excel', 'Esaku\KasBank\UangMasukController@importExcel');
Route::get('uang-masuk-tmp', 'Esaku\KasBank\UangMasukController@getDataTmp');


Route::get('uang-keluar', 'Esaku\KasBank\UangKeluarController@index');
Route::post('uang-keluar', 'Esaku\KasBank\UangKeluarController@store');
Route::get('uang-keluar/{id}', 'Esaku\KasBank\UangKeluarController@show');
Route::post('uang-keluar/{id}','Esaku\KasBank\UangKeluarController@update');
Route::delete('uang-keluar/{id}','Esaku\KasBank\UangKeluarController@destroy');
Route::post('uang-keluar-import-excel', 'Esaku\KasBank\UangKeluarController@importExcel');
Route::get('uang-keluar-tmp', 'Esaku\KasBank\UangKeluarController@getDataTmp');

Route::get('terima-dari', 'Esaku\KasBank\UangMasukController@getTerimaDari');
Route::get('akun-terima', 'Esaku\KasBank\UangMasukController@getAkunTerima');

Route::get('sync-master', 'Esaku\Inventori\SyncController@getSyncMaster');
Route::post('sync-master', 'Esaku\Inventori\SyncController@syncMaster');

Route::get('sync-pnj', 'Esaku\Inventori\SyncController@getSyncPnj');
Route::get('sync-pnj-detail', 'Esaku\Inventori\SyncController@getSyncPnjDetail');
Route::post('sync-pnj', 'Esaku\Inventori\SyncController@syncPnj');

Route::get('sync-pmb', 'Esaku\Inventori\SyncController@getSyncPmb');
Route::get('sync-pmb-detail', 'Esaku\Inventori\SyncController@getSyncPmbDetail');
Route::post('sync-pmb', 'Esaku\Inventori\SyncController@syncPmb');

Route::get('sync-retur-beli', 'Esaku\Inventori\SyncController@getSyncReturBeli');
Route::get('sync-retur-beli-detail', 'Esaku\Inventori\SyncController@getSyncReturBeliDetail');
Route::post('sync-retur-beli', 'Esaku\Inventori\SyncController@syncReturBeli');

Route::get('modultrans', 'Esaku\Keuangan\PostingController@getModul');
Route::post('loadJurnal', 'Esaku\Keuangan\PostingController@loadJurnal');
Route::post('posting', 'Esaku\Keuangan\PostingController@store');
Route::post('unposting-jurnal', 'Esaku\Keuangan\UnPostingController@loadJurnal');
Route::post('unposting', 'Esaku\Keuangan\UnPostingController@store');

Route::get('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@show');
Route::post('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@store');
Route::delete('jurnal-dok', 'Esaku\Keuangan\UploadDokJurnalController@destroy');

Route::get('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@show');
Route::post('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@store');
Route::delete('kas-bank-dok', 'Esaku\KasBank\UploadDokKasBankController@destroy');

//Closing Periode
Route::get('closing-periode','Esaku\Keuangan\ClosingPeriodeController@show');
Route::post('closing-periode','Esaku\Keuangan\ClosingPeriodeController@store');

Route::get('jurnal-penutup-list','Esaku\Keuangan\JurnalPenutupController@index');
Route::get('jurnal-penutup','Esaku\Keuangan\JurnalPenutupController@getDataAwal');
Route::post('jurnal-penutup','Esaku\Keuangan\JurnalPenutupController@store');

Route::post('sawal-upload', 'Esaku\Keuangan\SawalController@importExcel');
Route::get('sawal-load', 'Esaku\Keuangan\SawalController@getSawalTmp');
Route::post('sawal', 'Esaku\Keuangan\SawalController@store');

Route::post('jurnal-upload-upload', 'Esaku\Keuangan\JurnalUploadController@importExcel');
Route::get('jurnal-upload-load', 'Esaku\Keuangan\JurnalUploadController@getJurnalUploadTmp');
Route::post('jurnal-upload', 'Esaku\Keuangan\JurnalUploadController@store');

Route::post('akun-upload', 'Esaku\Keuangan\AkunController@importExcel');
Route::get('akun-load', 'Esaku\Keuangan\AkunController@getAkunTmp');
Route::post('akun', 'Esaku\Keuangan\AkunController@store');

/*
|--------------------------------------------------------------------------
| Modul Simpanan -Transaksi
|--------------------------------------------------------------------------
*/
Route::get('akru-simp','Esaku\Simpanan\Transaksi\AkruBillingController@index');
Route::get('show-akru/{no_bukti}','Esaku\Simpanan\Transaksi\AkruBillingController@show');
Route::get('akru-simp-jurnal/{tanggal}','Esaku\Simpanan\Transaksi\AkruBillingController@loadJurnal');
Route::post('akru-simp-jurnal','Esaku\Simpanan\Transaksi\AkruBillingController@store');
