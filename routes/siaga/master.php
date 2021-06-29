<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/karyawan', 'Siaga\KaryawanController@index');
Route::post('/karyawan', 'Siaga\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Siaga\KaryawanController@show');
Route::post('/karyawan/{nik}','Siaga\KaryawanController@update');
Route::delete('/karyawan/{nik}','Siaga\KaryawanController@destroy');

Route::get('/unit', 'Siaga\UnitController@index');
Route::post('/unit', 'Siaga\UnitController@store');
Route::get('/unit/{kode_pp}', 'Siaga\UnitController@show');
Route::put('/unit/{kode_pp}','Siaga\UnitController@update');
Route::delete('/unit/{kode_pp}','Siaga\UnitController@destroy');

Route::get('/jabatan', 'Siaga\JabatanController@index');
Route::post('/jabatan', 'Siaga\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Siaga\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Siaga\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Siaga\JabatanController@destroy');

Route::get('/role', 'Siaga\RoleController@index');
Route::post('/role', 'Siaga\RoleController@store');
Route::get('/role/{kode_role}', 'Siaga\RoleController@show');
Route::put('/role/{kode_role}','Siaga\RoleController@update');
Route::delete('/role/{kode_role}','Siaga\RoleController@destroy');

Route::get('/hakakses','Siaga\HakaksesController@index');
Route::get('/hakakses/{nik}','Siaga\HakaksesController@show');
Route::post('/hakakses','Siaga\HakaksesController@store');
Route::put('/hakakses/{nik}','Siaga\HakaksesController@update');
Route::delete('/hakakses/{nik}','Siaga\HakaksesController@destroy');
Route::get('/form','Siaga\HakaksesController@getForm');
Route::get('/hakakses_menu','Siaga\HakaksesController@getMenu');

Route::get('filter-pp','Siaga\FilterController@getFilterPP');
Route::get('filter-pp-one/{kode}','Siaga\FilterController@getFilterPPOne');
Route::get('filter-jabatan','Siaga\FilterController@getFilterJabatan');
Route::get('filter-nik','Siaga\FilterController@getFilterNik');
Route::get('filter-klp-menu','Siaga\FilterController@getFilterKlpMenu');
Route::get('filter-form','Siaga\FilterController@getFilterForm');




