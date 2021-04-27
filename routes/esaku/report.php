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
Route::get('filter-periode-perolehan', 'Esaku\Aktap\FilterAktapController@getPeriodePerolehan');
Route::get('filter-periode-susut', 'Esaku\Aktap\FilterAktapController@getPeriodeSusut');
Route::get('filter-klp-akun', 'Esaku\Aktap\FilterAktapController@getKlpAkun');
Route::get('filter-jenis', 'Esaku\Aktap\FilterAktapController@getJenis');
Route::get('filter-asset', 'Esaku\Aktap\FilterAktapController@getAsset');
Route::get('filter-pp-aktap', 'Esaku\Aktap\FilterAktapController@getPP');
Route::get('filter-bukti-jurnal-susut', 'Esaku\Aktap\FilterAktapController@getBuktiJurnalSusut');
Route::get('filter-tahun-aktap', 'Esaku\Aktap\FilterAktapController@getTahun');

Route::post('lap-aktap', 'Esaku\Aktap\LaporanController@getLaporanAktap');
Route::post('lap-aktap-tahun', 'Esaku\Aktap\LaporanController@getSaldoAktapTahunan');
Route::post('kartu-aktap', 'Esaku\Aktap\LaporanController@getKartuAktap');
Route::post('saldo-aktap', 'Esaku\Aktap\LaporanController@getSaldoAktap');

Route::post('lap-penjualan-harian', 'Esaku\Inventori\LaporanController@getPenjualanHarian');
Route::post('lap-penjualan', 'Esaku\Inventori\LaporanController@getPenjualan');
Route::post('lap-retur-beli', 'Esaku\Inventori\LaporanController@getReturBeli');
Route::post('lap-pembelian', 'Esaku\Inventori\LaporanController@getPembelian');
Route::post('lap-closing', 'Esaku\Inventori\LaporanController@getClosing');
Route::post('lap-barang', 'Esaku\Inventori\LaporanController@getBarang');
Route::post('lap-kartu-stok', 'Esaku\Inventori\LaporanController@getKartuStok');
Route::post('lap-saldo', 'Esaku\Inventori\LaporanController@getSaldo');
Route::post('lap-kartu', 'Esaku\Inventori\LaporanController@getKartu');
Route::post('lap-nrclajur', 'Esaku\Inventori\LaporanController@getNrcLajur');
Route::post('lap-jurnal', 'Esaku\Inventori\LaporanController@getJurnal');
Route::post('lap-buktijurnal', 'Esaku\Inventori\LaporanController@getBuktiJurnal');
Route::post('lap-bukubesar', 'Esaku\Inventori\LaporanController@getBukuBesar');
Route::post('lap-neraca', 'Esaku\Inventori\LaporanController@getNeraca');
Route::post('lap-labarugi', 'Esaku\Inventori\LaporanController@getLabaRugi');
Route::post('send-laporan', 'Esaku\Inventori\LaporanController@sendMail');
Route::post('email-nrclajur', 'Esaku\Inventori\LaporanController@sendNrcLajur');
Route::post('lap-neraca-komparasi', 'Esaku\Inventori\LaporanController@getNeracaKomparasi');
Route::post('lap-labarugi-komparasi', 'Esaku\Inventori\LaporanController@getLabaRugiKomparasi');
Route::post('lap-nrclajur-bulan', 'Esaku\Inventori\LaporanController@getNrcLajurBulan');
Route::post('lap-labarugi-bulan', 'Esaku\Inventori\LaporanController@getLabaRugiBulan');
Route::post('lap-neraca-bulan', 'Esaku\Inventori\LaporanController@getNeracaBulan');
Route::post('lap-coa', 'Esaku\Inventori\LaporanController@getCOA');
Route::post('lap-coa-struktur', 'Esaku\Inventori\LaporanController@getCOAStruktur');
Route::post('lap-labarugi-unit', 'Esaku\Inventori\LaporanController@getLabaRugiUnit');
Route::post('lap-labarugi-unit-dc', 'Esaku\Inventori\LaporanController@getLabaRugiUnitDC');

Route::get('lap-jurnal-pdf', 'Esaku\Inventori\LaporanController@getBuktiJurnalPDF');
Route::get('lap-bukubesar-pdf', 'Esaku\Inventori\LaporanController@getBukuBesarPDF');
Route::get('lap-nrclajur-pdf', 'Esaku\Inventori\LaporanController@getNrcLajurPDF');
Route::get('lap-neraca-pdf', 'Esaku\Inventori\LaporanController@getNeracaPDF');
Route::get('lap-labarugi-pdf', 'Esaku\Inventori\LaporanController@getLabaRugiPDF');
Route::get('lap-neraca-komparasi-pdf', 'Esaku\Inventori\LaporanController@getNeracaKomparasiPDF');
Route::get('lap-labarugi-komparasi-pdf', 'Esaku\Inventori\LaporanController@getLabaRugiKomparasiPDF');
Route::get('lap-nrclajur-bulan-pdf', 'Esaku\Inventori\LaporanController@getNrcLajurBulanPDF');
Route::get('lap-labarugi-bulan-pdf', 'Esaku\Inventori\LaporanController@getLabaRugiBulanPDF');
Route::get('lap-neraca-bulan-pdf', 'Esaku\Inventori\LaporanController@getNeracaBulanPDF');
Route::get('lap-coa-pdf', 'Esaku\Inventori\LaporanController@getCOAPDF');
Route::get('lap-coa-struktur-pdf', 'Esaku\Inventori\LaporanController@getCOAStrukturPDF');
Route::get('lap-labarugi-unit-pdf', 'Esaku\Inventori\LaporanController@getLabaRugiUnitPDF');
Route::get('lap-labarugi-unit-dc-pdf', 'Esaku\Inventori\LaporanController@getLabaRugiUnitDCPDF');


Route::post('lap-jurnal-kb', 'Esaku\Inventori\LaporanController@getJurnalKB');
Route::get('lap-jurnal-kb-pdf', 'Esaku\Inventori\LaporanController@getJurnalKBPDF');
Route::post('lap-buktijurnal-kb', 'Esaku\Inventori\LaporanController@getBuktiJurnalKB');
Route::get('lap-buktijurnal-kb-pdf', 'Esaku\Inventori\LaporanController@getBuktiJurnalKBPDF');
Route::post('lap-buku-kb', 'Esaku\Inventori\LaporanController@getBukuKas');
Route::get('lap-buku-kb-pdf', 'Esaku\Inventori\LaporanController@getBukuKasPDF');
Route::post('lap-saldo-kb', 'Esaku\Inventori\LaporanController@getSaldoKB');
Route::get('lap-saldo-kb-pdf', 'Esaku\Inventori\LaporanController@getSaldoKBPDF');


/*
|--------------------------------------------------------------------------
| Modul Simpanan -Laporan
|--------------------------------------------------------------------------
*/
Route::get('filter-anggota','Esaku\Simpanan\Laporan\ReportAnggotaController@getAnggota');
Route::get('filter-kartu','Esaku\Simpanan\Laporan\ReportAnggotaController@getKartu');
Route::post('report-anggota','Esaku\Simpanan\Laporan\ReportAnggotaController@index');

// Laporan Simpanan
Route::post('lap-simp-simpanan','Esaku\Simpanan\Laporan\ReportSimpananController@index');

//Laporan Saldo Simpanan
Route::post('lap-simp-saldo','Esaku\Simpanan\Laporan\ReportSaldoSimpananController@index');

// Laporan Akru Simpanan
Route::get('filter-bukti','Esaku\Simpanan\Laporan\ReportAkruSimpananController@getBukti');
Route::post('lap-simp-akru','Esaku\Simpanan\Laporan\ReportAkruSimpananController@index');

// Laporan Pembayaran Simpanan
Route::get('filter-bukti-bayar','Esaku\Simpanan\Laporan\ReportBayarSimpananController@getBukti');
Route::post('lap-simp-bayar','Esaku\Simpanan\Laporan\ReportBayarSimpananController@index');

//Laporan Pembatalan Simpanan
Route::get('filter-bukti-batal','Esaku\Simpanan\Laporan\ReportBatalSimpananController@getBukti');
Route::post('lap-simp-batal','Esaku\Simpanan\Laporan\ReportBatalSimpananController@index');

// Laporan Rekap Simpanan
Route::post('lap-simp-rekap','Esaku\Simpanan\Laporan\ReportRekapSimpananController@index');

// Laporan Anggaran
## Filter
Route::get('filter-tahun-anggaran', 'Esaku\Anggaran\FilterLaporanController@getTahun');
Route::get('filter-akun-anggaran', 'Esaku\Anggaran\FilterLaporanController@getAkun');
Route::get('filter-pp-anggaran', 'Esaku\Anggaran\FilterLaporanController@getPP');
Route::get('filter-jenis-anggaran', 'Esaku\Anggaran\FilterLaporanController@getJenis');
Route::get('filter-status-anggaran', 'Esaku\Anggaran\FilterLaporanController@getStatus');
Route::get('filter-periodik-anggaran', 'Esaku\Anggaran\FilterLaporanController@getPeriodik');
Route::get('filter-periode-anggaran', 'Esaku\Anggaran\FilterLaporanController@getPeriode');
Route::get('filter-rra-anggaran', 'Esaku\Anggaran\FilterLaporanController@getJenisRRA');

## Laporan
Route::post('lap-anggaran', 'Esaku\Anggaran\LaporanController@getLaporanAnggaran');
Route::post('lap-komparasi-anggaran', 'Esaku\Anggaran\LaporanController@getLaporanKomparasiAnggaran');
Route::post('lap-pencapaian-anggaran', 'Esaku\Anggaran\LaporanController@getLaporanPencapaianAnggaran');
