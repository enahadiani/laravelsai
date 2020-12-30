<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Setting Menu Form //
Route::get('setting-menu', 'DashTelu\SettingMenuController@show');
Route::post('setting-menu', 'DashTelu\SettingMenuController@store');
Route::post('setting-menu-move', 'DashTelu\SettingMenuController@storeMove');
Route::put('setting-menu', 'DashTelu\SettingMenuController@update');
Route::delete('setting-menu', 'DashTelu\SettingMenuController@delete');

// Data Form //
Route::get('form', 'DashTelu\FormController@index');
Route::get('form/{id}', 'DashTelu\FormController@getData');
Route::post('form', 'DashTelu\FormController@store');
Route::put('form/{id}', 'DashTelu\FormController@update');
Route::delete('form/{id}', 'DashTelu\FormController@delete');

// Data Klp Menu //
Route::get('menu-klp', 'DashTelu\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'DashTelu\KelompokMenuController@getData');
Route::post('menu-klp', 'DashTelu\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'DashTelu\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'DashTelu\KelompokMenuController@delete');

// Data Akses //
Route::get('akses-user', 'DashTelu\AksesUserController@index');
Route::get('akses-user/{id}', 'DashTelu\AksesUserController@getData');
Route::post('akses-user', 'DashTelu\AksesUserController@store');
Route::put('akses-user/{id}', 'DashTelu\AksesUserController@update');
Route::delete('akses-user/{id}', 'DashTelu\AksesUserController@delete');

// Data Karyawan //
Route::get('karyawan', 'DashTelu\KaryawanController@index');
Route::get('karyawan/{id}', 'DashTelu\KaryawanController@getData');
Route::post('karyawan', 'DashTelu\KaryawanController@store');
Route::post('karyawan-ubah/{id}', 'DashTelu\KaryawanController@update');
Route::delete('karyawan/{id}', 'DashTelu\KaryawanController@delete');

// Data Unit //
Route::get('unit', 'DashTelu\UnitController@index');
Route::get('unit/{id}', 'DashTelu\UnitController@getData');
Route::post('unit', 'DashTelu\UnitController@store');
Route::put('unit/{id}', 'DashTelu\UnitController@update');
Route::delete('unit/{id}', 'DashTelu\UnitController@delete');

// Setting Menu Form //
Route::get('fs', 'DashTelu\FSController@index');
Route::get('fs/{id}', 'DashTelu\FSController@show');
Route::post('fs', 'DashTelu\FSController@store');
Route::put('fs/{id}', 'DashTelu\FSController@update');
Route::delete('fs/{id}', 'DashTelu\FSController@delete');

