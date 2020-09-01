<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('cust-akun', 'Wisata\HelperController@getAkunCust');
Route::get('vendor-akun', 'Wisata\HelperController@getAkunVend');
Route::get('gudang-nik', 'Wisata\HelperController@getNIKGud');
Route::get('gudang-pp', 'Wisata\HelperController@getPPGud');
Route::get('barang-klp-persediaan', 'Wisata\HelperController@getAkunPersKelBar');
Route::get('barang-klp-pendapatan', 'Wisata\HelperController@getAkunPdptKelBar');
Route::get('barang-klp-hpp', 'Wisata\HelperController@getAkunHPPKelBar');
Route::get('menu-klp', 'Wisata\HelperController@getKlpMenu');
Route::get('menu-form', 'Wisata\HelperController@getLabMenu');
Route::get('masakun-curr','Wisata\HelperController@getCurr');
Route::get('masakun-modul','Wisata\HelperController@getModul');
Route::get('reftrans-kode/{jenis}','Wisata\HelperController@getRef');
Route::get('reftrans-pemasukan','Wisata\HelperController@getRefPemasukan');
Route::get('reftrans-pengeluaran','Wisata\HelperController@getRefPengeluaran');
Route::get('reftrans-pindah-buku','Wisata\HelperController@getRefPindahBuku');

// Data Customer //
Route::get('cust', 'Wisata\CustomerController@index');
Route::get('cust/{id}', 'Wisata\CustomerController@getData');
Route::post('cust', 'Wisata\CustomerController@store');
Route::put('cust/{id}', 'Wisata\CustomerController@update');
Route::delete('cust/{id}', 'Wisata\CustomerController@delete');

// Data Vendor //
Route::get('vendor', 'Wisata\VendorController@index');
Route::get('vendor/{id}', 'Wisata\VendorController@getData');
Route::post('vendor', 'Wisata\VendorController@store');
Route::put('vendor/{id}', 'Wisata\VendorController@update');
Route::delete('vendor/{id}', 'Wisata\VendorController@delete');

// Data Gudang //
Route::get('gudang', 'Wisata\GudangController@index');
Route::get('gudang/{id}', 'Wisata\GudangController@getData');
Route::post('gudang', 'Wisata\GudangController@store');
Route::put('gudang/{id}', 'Wisata\GudangController@update');
Route::delete('gudang/{id}', 'Wisata\GudangController@delete');

// Data Kelompok Barang //
Route::get('barang-klp', 'Wisata\KelompokBarangController@index');
Route::get('barang-klp/{id}', 'Wisata\KelompokBarangController@getData');
Route::post('barang-klp', 'Wisata\KelompokBarangController@store');
Route::put('barang-klp/{id}', 'Wisata\KelompokBarangController@update');
Route::delete('barang-klp/{id}', 'Wisata\KelompokBarangController@delete');

// Data Satuan Barang //
Route::get('barang-satuan', 'Wisata\SatuanBarangController@index');
Route::get('barang-satuan/{id}', 'Wisata\SatuanBarangController@getData');
Route::post('barang-satuan', 'Wisata\SatuanBarangController@store');
Route::put('barang-satuan/{id}', 'Wisata\SatuanBarangController@update');
Route::delete('barang-satuan/{id}', 'Wisata\SatuanBarangController@delete');

// Data Barang //
Route::get('barang', 'Wisata\BarangController@index');
Route::get('barang/{id}', 'Wisata\BarangController@getData');
Route::post('barang', 'Wisata\BarangController@store');
Route::put('barang/{id}', 'Wisata\BarangController@update');
Route::delete('barang/{id}', 'Wisata\BarangController@delete');

// Data Bonus //
Route::get('bonus', 'Wisata\BonusController@index');
Route::get('bonus/{id}', 'Wisata\BonusController@getData');
Route::post('bonus', 'Wisata\BonusController@store');
Route::put('bonus/{id}', 'Wisata\BonusController@update');
Route::delete('bonus/{id}', 'Wisata\BonusController@delete');

// Data Unit //
Route::get('unit', 'Wisata\UnitController@index');
Route::get('unit/{id}', 'Wisata\UnitController@getData');
Route::post('unit', 'Wisata\UnitController@store');
Route::put('unit/{id}', 'Wisata\UnitController@update');
Route::delete('unit/{id}', 'Wisata\UnitController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'Wisata\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Wisata\KelompokMenuController@getData');
Route::post('menu-klp', 'Wisata\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Wisata\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Wisata\KelompokMenuController@delete');

// Data Karyawan //
Route::get('karyawan', 'Wisata\KaryawanController@index');
Route::get('karyawan-detail/{id}', 'Wisata\KaryawanController@getData');
Route::post('karyawan', 'Wisata\KaryawanController@store');
Route::put('karyawan-ubah/{id}', 'Wisata\KaryawanController@update');
Route::delete('karyawan/{id}', 'Wisata\KaryawanController@delete');

// Data Akses //
Route::get('akses-user', 'Wisata\AksesUserController@index');
Route::get('akses-user-detail/{id}', 'Wisata\AksesUserController@getData');
Route::post('akses-user', 'Wisata\AksesUserController@store');
Route::put('akses-user/{id}', 'Wisata\AksesUserController@update');
Route::delete('akses-user/{id}', 'Wisata\AksesUserController@delete');

// Data Form //
Route::get('form', 'Wisata\FormController@index');
Route::get('form/{id}', 'Wisata\FormController@getData');
Route::post('form', 'Wisata\FormController@store');
Route::put('form/{id}', 'Wisata\FormController@update');
Route::delete('form/{id}', 'Wisata\FormController@delete');

// Setting Menu Form //
Route::get('menu/{id}', 'Wisata\SettingMenuController@getData');
Route::post('menu', 'Wisata\SettingMenuController@store');
Route::post('menu-move', 'Wisata\SettingMenuController@storeMenu');
Route::put('menu/{kd_menu}/{kd_klp}', 'Wisata\SettingMenuController@update');
Route::delete('menu/{kd_menu}/{kd_klp}', 'Wisata\SettingMenuController@delete');

// Data Akun //
Route::get('masakun', 'Wisata\MasakunController@index');
Route::get('masakun-detail/{id}', 'Wisata\MasakunController@show');
Route::post('masakun', 'Wisata\MasakunController@store');
Route::put('masakun/{id}', 'Wisata\MasakunController@update');
Route::delete('masakun/{id}', 'Wisata\MasakunController@delete');

// Data Referensi Transaksi //
Route::get('reftrans', 'Wisata\ReferensiTransController@index');
Route::get('reftrans-detail/{id}', 'Wisata\ReferensiTransController@getData');
Route::post('reftrans', 'Wisata\ReferensiTransController@store');
Route::put('reftrans/{id}', 'Wisata\ReferensiTransController@update');
Route::delete('reftrans/{id}', 'Wisata\ReferensiTransController@delete');

// Data Jasa Kirim //
Route::get('jasa-kirim', 'Wisata\JasaKirimController@index');
Route::get('jasa-kirim-detail', 'Wisata\JasaKirimController@getData');
Route::post('jasa-kirim', 'Wisata\JasaKirimController@store');
Route::put('jasa-kirim', 'Wisata\JasaKirimController@update');
Route::delete('jasa-kirim', 'Wisata\JasaKirimController@delete');

// Data Customer //
Route::get('cust-ol', 'Wisata\CustomerOLController@index');
Route::get('cust-ol/{id}', 'Wisata\CustomerOLController@getData');
Route::post('cust-ol', 'Wisata\CustomerOLController@store');
Route::put('cust-ol/{id}', 'Wisata\CustomerOLController@update');
Route::delete('cust-ol/{id}', 'Wisata\CustomerOLController@delete');

