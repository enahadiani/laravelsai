<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Setting Menu Form //
Route::get('setting-menu', 'DashItpln\SettingMenuController@show');
Route::post('setting-menu', 'DashItpln\SettingMenuController@store');
Route::post('setting-menu-move', 'DashItpln\SettingMenuController@storeMove');
Route::put('setting-menu', 'DashItpln\SettingMenuController@update');
Route::delete('setting-menu', 'DashItpln\SettingMenuController@delete');

// Data Form //
Route::get('form', 'DashItpln\FormController@index');
Route::get('form/{id}', 'DashItpln\FormController@getData');
Route::post('form', 'DashItpln\FormController@store');
Route::put('form/{id}', 'DashItpln\FormController@update');
Route::delete('form/{id}', 'DashItpln\FormController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'DashItpln\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'DashItpln\KelompokMenuController@getData');
Route::post('menu-klp', 'DashItpln\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'DashItpln\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'DashItpln\KelompokMenuController@delete');

// Data Akses //
Route::get('akses-user', 'DashItpln\AksesUserController@index');
Route::get('akses-user/{id}', 'DashItpln\AksesUserController@getData');
Route::post('akses-user', 'DashItpln\AksesUserController@store');
Route::put('akses-user/{id}', 'DashItpln\AksesUserController@update');
Route::delete('akses-user/{id}', 'DashItpln\AksesUserController@delete');

// Data Karyawan //
Route::get('karyawan', 'DashItpln\KaryawanController@index');
Route::get('karyawan/{id}', 'DashItpln\KaryawanController@getData');
Route::post('karyawan', 'DashItpln\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'DashItpln\KaryawanController@update');
Route::delete('karyawan/{id}', 'DashItpln\KaryawanController@delete');

// Data Unit //
Route::get('unit', 'DashItpln\UnitController@index');
Route::get('unit/{id}', 'DashItpln\UnitController@getData');
Route::post('unit', 'DashItpln\UnitController@store');
Route::put('unit/{id}', 'DashItpln\UnitController@update');
Route::delete('unit/{id}', 'DashItpln\UnitController@delete');

// Setting Menu Form //
Route::get('fs', 'DashItpln\FSController@index');
Route::get('fs/{id}', 'DashItpln\FSController@show');
Route::post('fs', 'DashItpln\FSController@store');
Route::put('fs/{id}', 'DashItpln\FSController@update');
Route::delete('fs/{id}', 'DashItpln\FSController@delete');

