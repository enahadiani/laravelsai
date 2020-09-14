<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Esaku\HelperController@getAkunCust');
Route::get('vendor-akun', 'Esaku\HelperController@getAkunVend');
Route::get('gudang-nik', 'Esaku\HelperController@getNIKGud');
Route::get('gudang-pp', 'Esaku\HelperController@getPPGud');
Route::get('barang-klp-persediaan', 'Esaku\HelperController@getAkunPersKelBar');
Route::get('barang-klp-pendapatan', 'Esaku\HelperController@getAkunPdptKelBar');
Route::get('barang-klp-hpp', 'Esaku\HelperController@getAkunHPPKelBar');
Route::get('menu-klp', 'Esaku\HelperController@getKlpMenu');
Route::get('menu-form', 'Esaku\HelperController@getLabMenu');
Route::get('masakun-curr','Esaku\HelperController@getCurr');
Route::get('masakun-modul','Esaku\HelperController@getModul');
Route::get('reftrans-kode/{jenis}','Esaku\HelperController@getRef');
Route::get('reftrans-pemasukan','Esaku\HelperController@getRefPemasukan');
Route::get('reftrans-pengeluaran','Esaku\HelperController@getRefPengeluaran');
Route::get('reftrans-pindah-buku','Esaku\HelperController@getRefPindahBuku');

// Data Customer //
Route::get('cust', 'Esaku\CustomerController@index');
Route::get('cust/{id}', 'Esaku\CustomerController@getData');
Route::post('cust', 'Esaku\CustomerController@store');
Route::put('cust/{id}', 'Esaku\CustomerController@update');
Route::delete('cust/{id}', 'Esaku\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Esaku\VendorController@index');
Route::get('vendor/{id}', 'Esaku\VendorController@getData');
Route::post('vendor', 'Esaku\VendorController@store');
Route::put('vendor/{id}', 'Esaku\VendorController@update');
Route::delete('vendor/{id}', 'Esaku\VendorController@delete');

// Data Gudang //
Route::get('gudang', 'Esaku\GudangController@index');
Route::get('gudang/{id}', 'Esaku\GudangController@getData');
Route::post('gudang', 'Esaku\GudangController@store');
Route::put('gudang/{id}', 'Esaku\GudangController@update');
Route::delete('gudang/{id}', 'Esaku\GudangController@delete');

// Data Kelompok Barang //
Route::get('barang-klp', 'Esaku\KelompokBarangController@index');
Route::get('barang-klp/{id}', 'Esaku\KelompokBarangController@getData');
Route::post('barang-klp', 'Esaku\KelompokBarangController@store');
Route::put('barang-klp/{id}', 'Esaku\KelompokBarangController@update');
Route::delete('barang-klp/{id}', 'Esaku\KelompokBarangController@delete');

// Data Satuan Barang //
Route::get('barang-satuan', 'Esaku\SatuanBarangController@index');
Route::get('barang-satuan/{id}', 'Esaku\SatuanBarangController@getData');
Route::post('barang-satuan', 'Esaku\SatuanBarangController@store');
Route::put('barang-satuan/{id}', 'Esaku\SatuanBarangController@update');
Route::delete('barang-satuan/{id}', 'Esaku\SatuanBarangController@delete');

// Data Barang //
Route::get('barang', 'Esaku\BarangController@index');
Route::get('barang/{id}', 'Esaku\BarangController@getData');
Route::post('barang', 'Esaku\BarangController@store');
Route::put('barang/{id}', 'Esaku\BarangController@update');
Route::delete('barang/{id}', 'Esaku\BarangController@delete');

// Data Bonus //
Route::get('bonus', 'Esaku\BonusController@index');
Route::get('bonus/{id}', 'Esaku\BonusController@getData');
Route::post('bonus', 'Esaku\BonusController@store');
Route::put('bonus/{id}', 'Esaku\BonusController@update');
Route::delete('bonus/{id}', 'Esaku\BonusController@delete');

// Data Unit //
Route::get('unit', 'Esaku\UnitController@index');
Route::get('unit/{id}', 'Esaku\UnitController@getData');
Route::post('unit', 'Esaku\UnitController@store');
Route::put('unit/{id}', 'Esaku\UnitController@update');
Route::delete('unit/{id}', 'Esaku\UnitController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Esaku\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Esaku\KelompokMenuController@getData');
Route::post('menu-klp', 'Esaku\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Esaku\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Esaku\KelompokMenuController@delete');

// Data Karyawan //
Route::get('karyawan', 'Esaku\KaryawanController@index');
Route::get('karyawan-detail/{id}', 'Esaku\KaryawanController@getData');
Route::post('karyawan', 'Esaku\KaryawanController@store');
Route::put('karyawan-ubah/{id}', 'Esaku\KaryawanController@update');
Route::delete('karyawan/{id}', 'Esaku\KaryawanController@delete');

// Data Akses //
Route::get('akses-user', 'Esaku\AksesUserController@index');
Route::get('akses-user-detail/{id}', 'Esaku\AksesUserController@getData');
Route::post('akses-user', 'Esaku\AksesUserController@store');
Route::put('akses-user/{id}', 'Esaku\AksesUserController@update');
Route::delete('akses-user/{id}', 'Esaku\AksesUserController@delete');

// Data Form //
Route::get('form', 'Esaku\FormController@index');
Route::get('form/{id}', 'Esaku\FormController@getData');
Route::post('form', 'Esaku\FormController@store');
Route::put('form/{id}', 'Esaku\FormController@update');
Route::delete('form/{id}', 'Esaku\FormController@delete');

// Setting Menu Form //
Route::get('menu/{id}', 'Esaku\SettingMenuController@getData');
Route::post('menu', 'Esaku\SettingMenuController@store');
Route::post('menu-move', 'Esaku\SettingMenuController@storeMenu');
Route::put('menu/{kd_menu}/{kd_klp}', 'Esaku\SettingMenuController@update');
Route::delete('menu/{kd_menu}/{kd_klp}', 'Esaku\SettingMenuController@delete');

// Data Akun //
Route::get('masakun', 'Esaku\MasakunController@index');
Route::get('masakun-detail/{id}', 'Esaku\MasakunController@show');
Route::post('masakun', 'Esaku\MasakunController@store');
Route::put('masakun/{id}', 'Esaku\MasakunController@update');
Route::delete('masakun/{id}', 'Esaku\MasakunController@delete');

// Data Referensi Transaksi //
Route::get('reftrans', 'Esaku\ReferensiTransController@index');
Route::get('reftrans-detail/{id}', 'Esaku\ReferensiTransController@getData');
Route::post('reftrans', 'Esaku\ReferensiTransController@store');
Route::put('reftrans/{id}', 'Esaku\ReferensiTransController@update');
Route::delete('reftrans/{id}', 'Esaku\ReferensiTransController@delete');

// Data Jasa Kirim //
Route::get('jasa-kirim', 'Esaku\JasaKirimController@index');
Route::get('jasa-kirim-detail', 'Esaku\JasaKirimController@getData');
Route::post('jasa-kirim', 'Esaku\JasaKirimController@store');
Route::put('jasa-kirim', 'Esaku\JasaKirimController@update');
Route::delete('jasa-kirim', 'Esaku\JasaKirimController@delete');

// Data Customer //
Route::get('cust-ol', 'Esaku\CustomerOLController@index');
Route::get('cust-ol/{id}', 'Esaku\CustomerOLController@getData');
Route::post('cust-ol', 'Esaku\CustomerOLController@store');
Route::put('cust-ol/{id}', 'Esaku\CustomerOLController@update');
Route::delete('cust-ol/{id}', 'Esaku\CustomerOLController@delete');

//Format Laporan
Route::get('format-laporan','Esaku\FormatLaporanController@show');
Route::post('format-laporan','Esaku\FormatLaporanController@store');
Route::put('format-laporan','Esaku\FormatLaporanController@update');
Route::delete('format-laporan','Esaku\FormatLaporanController@destroy');
Route::get('format-laporan-versi','Esaku\FormatLaporanController@getVersi');
Route::get('format-laporan-tipe','Esaku\FormatLaporanController@getTipe');
Route::get('format-laporan-relakun','Esaku\FormatLaporanController@getRelakun');
Route::post('format-laporan-relasi','Esaku\FormatLaporanController@simpanRelasi');
Route::post('format-laporan-move','Esaku\FormatLaporanController@simpanMove');

