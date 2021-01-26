<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-periode', 'Esaku\HelperController@getPeriodePnj');
Route::get('filter-nik', 'Esaku\HelperController@getNikPnj');
Route::get('filter-tanggal', 'Esaku\HelperController@getTanggalPnj');
Route::get('filter-bukti', 'Esaku\HelperController@getBuktiPnj');
Route::get('filter-periode-pmb', 'Esaku\HelperController@getPeriodePmb');
Route::get('filter-nik-pmb', 'Esaku\HelperController@getNikPmb');
Route::get('filter-bukti-pmb', 'Esaku\HelperController@getBuktiPmb');
Route::get('filter-periode-close', 'Esaku\HelperController@getPeriodeClose');
Route::get('filter-nik-close', 'Esaku\HelperController@getNikClose');
Route::get('filter-bukti-close', 'Esaku\HelperController@getBuktiClose');
Route::get('filter-barang', 'Esaku\HelperController@getBarang');
Route::get('filter-periode-retur', 'Esaku\HelperController@getPeriodeRetur');
Route::get('filter-nik-retur', 'Esaku\HelperController@getNikRetur');
Route::get('filter-bukti-retur', 'Esaku\HelperController@getBuktiRetur');
Route::get('filter-akun', 'Esaku\HelperController@getFilterAkun');
Route::get('filter-periode-keu', 'Esaku\HelperController@getFilterPeriodeKeuangan');
Route::get('filter-fs', 'Esaku\HelperController@getFilterFS');
Route::get('filter-level', 'Esaku\HelperController@getFilterLevel');
Route::get('filter-format', 'Esaku\HelperController@getFilterFormat');
Route::get('filter-sumju', 'Esaku\HelperController@getFilterSumju');
Route::get('filter-modul', 'Esaku\HelperController@getFilterModul');
Route::get('filter-bukti-jurnal', 'Esaku\HelperController@getFilterBuktiJurnal');
Route::get('filter-mutasi', 'Esaku\HelperController@getFilterMutasi');
Route::get('filter-mutasi-kontrol', 'Esaku\HelperController@getFilterBuktiKontrolMutasi');
Route::get('filter-gudang', 'Esaku\HelperController@getFilterGudang');
Route::get('filter-barang-klp', 'Esaku\HelperController@getFilterKlpBarang');
Route::get('filter-tahun', 'Esaku\HelperController@getFilterTahun');
Route::get('filter-output', 'Esaku\HelperController@getFilterOutput');
Route::get('filter-jeniscoa', 'Esaku\HelperController@getFilterJenisCOA');
Route::get('filter-pp', 'Esaku\HelperController@getFilterPP');
Route::get('filter-periode-kb', 'Esaku\HelperController@getFilterPeriodeKB');
Route::get('filter-bukti-jurnal-kb', 'Esaku\HelperController@getFilterBuktiJurnalKB');

//AKTAP//
Route::get('filter-periode-perolehan', 'Esaku\FilterAktapController@getPeriodePerolehan');
Route::get('filter-periode-susut', 'Esaku\FilterAktapController@getPeriodeSusut');
Route::get('filter-klp-akun', 'Esaku\FilterAktapController@getKlpAkun');
Route::get('filter-jenis', 'Esaku\FilterAktapController@getJenis');
Route::get('filter-asset', 'Esaku\FilterAktapController@getAsset');
Route::get('filter-pp-aktap', 'Esaku\FilterAktapController@getPP');
Route::get('filter-bukti-jurnal-susut', 'Esaku\FilterAktapController@getBuktiJurnalSusut');
Route::get('filter-tahun-aktap', 'Esaku\FilterAktapController@getTahun');

Route::post('lap-penjualan-harian', 'Esaku\LaporanController@getPenjualanHarian');
Route::post('lap-penjualan', 'Esaku\LaporanController@getPenjualan');
Route::post('lap-retur-beli', 'Esaku\LaporanController@getReturBeli');
Route::post('lap-pembelian', 'Esaku\LaporanController@getPembelian');
Route::post('lap-closing', 'Esaku\LaporanController@getClosing');
Route::post('lap-barang', 'Esaku\LaporanController@getBarang');
Route::post('lap-kartu-stok', 'Esaku\LaporanController@getKartuStok');
Route::post('lap-saldo', 'Esaku\LaporanController@getSaldo');
Route::post('lap-kartu', 'Esaku\LaporanController@getKartu');
Route::post('lap-nrclajur', 'Esaku\LaporanController@getNrcLajur');
Route::post('lap-jurnal', 'Esaku\LaporanController@getJurnal');
Route::post('lap-buktijurnal', 'Esaku\LaporanController@getBuktiJurnal');
Route::post('lap-bukubesar', 'Esaku\LaporanController@getBukuBesar');
Route::post('lap-neraca', 'Esaku\LaporanController@getNeraca');
Route::post('lap-labarugi', 'Esaku\LaporanController@getLabaRugi');
Route::post('send-laporan', 'Esaku\LaporanController@sendMail');
Route::post('email-nrclajur', 'Esaku\LaporanController@sendNrcLajur');
Route::post('lap-neraca-komparasi', 'Esaku\LaporanController@getNeracaKomparasi');
Route::post('lap-labarugi-komparasi', 'Esaku\LaporanController@getLabaRugiKomparasi');
Route::post('lap-nrclajur-bulan', 'Esaku\LaporanController@getNrcLajurBulan');
Route::post('lap-labarugi-bulan', 'Esaku\LaporanController@getLabaRugiBulan');
Route::post('lap-neraca-bulan', 'Esaku\LaporanController@getNeracaBulan');
Route::post('lap-coa', 'Esaku\LaporanController@getCOA');
Route::post('lap-coa-struktur', 'Esaku\LaporanController@getCOAStruktur');
Route::post('lap-labarugi-unit', 'Esaku\LaporanController@getLabaRugiUnit');
Route::post('lap-labarugi-unit-dc', 'Esaku\LaporanController@getLabaRugiUnitDC');

Route::get('lap-jurnal-pdf', 'Esaku\LaporanController@getJurnalPDF');
Route::get('lap-bukubesar-pdf', 'Esaku\LaporanController@getBukuBesarPDF');
Route::get('lap-nrclajur-pdf', 'Esaku\LaporanController@getNrcLajurPDF');
Route::get('lap-neraca-pdf', 'Esaku\LaporanController@getNeracaPDF');
Route::get('lap-labarugi-pdf', 'Esaku\LaporanController@getLabaRugiPDF');
Route::get('lap-neraca-komparasi-pdf', 'Esaku\LaporanController@getNeracaKomparasiPDF');
Route::get('lap-labarugi-komparasi-pdf', 'Esaku\LaporanController@getLabaRugiKomparasiPDF');
Route::get('lap-nrclajur-bulan-pdf', 'Esaku\LaporanController@getNrcLajurBulanPDF');
Route::get('lap-labarugi-bulan-pdf', 'Esaku\LaporanController@getLabaRugiBulanPDF');
Route::get('lap-neraca-bulan-pdf', 'Esaku\LaporanController@getNeracaBulanPDF');
Route::get('lap-coa-pdf', 'Esaku\LaporanController@getCOAPDF');
Route::get('lap-coa-struktur-pdf', 'Esaku\LaporanController@getCOAStrukturPDF');
Route::get('lap-labarugi-unit-pdf', 'Esaku\LaporanController@getLabaRugiUnitPDF');
Route::get('lap-labarugi-unit-dc-pdf', 'Esaku\LaporanController@getLabaRugiUnitDCPDF');


Route::post('lap-jurnal-kb', 'Esaku\LaporanController@getJurnalKB');
Route::post('lap-buktijurnal-kb', 'Esaku\LaporanController@getBuktiJurnalKB');
Route::post('lap-buku-kb', 'Esaku\LaporanController@getBukuKas');
Route::post('lap-saldo-kb', 'Esaku\LaporanController@getSaldoKB');