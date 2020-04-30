<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form/{id}', function ($id) {
    // if(!Session::has('isLoggedIn')){
    //     return redirect('apv/login')->with('alert','Session telah habis !');
    // }else{
        return view('apv.'.$id);
    // }
});

Route::get('/', 'Apv\AuthController@index');
Route::get('/cek_session', 'Apv\AuthController@cek_session');
Route::get('/dash', 'Apv\AuthController@index');
Route::get('/menu', 'Apv\AuthController@getMenu');
Route::get('/login', 'Apv\AuthController@login');
Route::post('/login', 'Apv\AuthController@cek_auth');
Route::get('/logout', 'Apv\AuthController@logout');

Route::get('/karyawan', 'Apv\KaryawanController@index');
Route::post('/karyawan', 'Apv\KaryawanController@store');
Route::get('/karyawan/{nik}', 'Apv\KaryawanController@show');
Route::post('/karyawan/{nik}','Apv\KaryawanController@update');
Route::delete('/karyawan/{nik}','Apv\KaryawanController@destroy');

Route::get('/unit', 'Apv\UnitController@index');
Route::post('/unit', 'Apv\UnitController@store');
Route::get('/unit/{kode_pp}', 'Apv\UnitController@show');
Route::put('/unit/{kode_pp}','Apv\UnitController@update');
Route::delete('/unit/{kode_pp}','Apv\UnitController@destroy');

Route::get('/jabatan', 'Apv\JabatanController@index');
Route::post('/jabatan', 'Apv\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Apv\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Apv\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Apv\JabatanController@destroy');

Route::get('/role', 'Apv\RoleController@index');
Route::post('/role', 'Apv\RoleController@store');
Route::get('/role/{kode_role}', 'Apv\RoleController@show');
Route::put('/role/{kode_role}','Apv\RoleController@update');
Route::delete('/role/{kode_role}','Apv\RoleController@destroy');

Route::get('/hakakses','Apv\HakaksesController@index');
Route::get('/hakakses/{nik}','Apv\HakaksesController@show');
Route::post('/hakakses','Apv\HakaksesController@store');
Route::put('/hakakses/{nik}','Apv\HakaksesController@update');
Route::delete('/hakakses/{nik}','Apv\HakaksesController@destroy');
Route::get('/form','Apv\HakaksesController@getForm');
Route::get('/hakakses_menu','Apv\HakaksesController@getMenu');

Route::get('juskeb','Apv\JuskebController@index');
Route::get('juskeb/{no_bukti}','Apv\JuskebController@show');
Route::post('juskeb','Apv\JuskebController@store');
Route::post('juskeb/{no_bukti}','Apv\JuskebController@update');
Route::delete('juskeb/{no_bukti}','Apv\JuskebController@destroy');
Route::get('juskeb_history/{no_bukti}','Apv\JuskebController@getHistory');
Route::get('juskeb_preview/{no_bukti}','Apv\JuskebController@getPreview');

Route::get('verifikasi','Apv\VerifikasiController@index');
Route::get('verifikasi/{no_bukti}','Apv\VerifikasiController@show');
Route::post('verifikasi','Apv\VerifikasiController@store');
Route::get('verifikasi_status','Apv\VerifikasiController@getStatus');

Route::get('juskeb_app','Apv\JuskebApprovalController@index');
Route::get('juskeb_aju','Apv\JuskebApprovalController@getPengajuan');
Route::get('juskeb_app/{no_bukti}','Apv\JuskebApprovalController@show');
Route::post('juskeb_app','Apv\JuskebApprovalController@store');
Route::get('juskeb_app_status','Apv\JuskebApprovalController@getStatus');


