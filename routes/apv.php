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
    if(!Session::has('isLoggedIn')){
        return redirect('apv/login')->with('alert','Session telah habis !');
    }else{
        return view('apv.'.$id);
    }
});

Route::get('/', 'Apv\AuthController@index');
Route::get('/dash', 'Apv\AuthController@index');
Route::get('/menu', 'Apv\AuthController@getMenu');
Route::get('/login', 'Apv\AuthController@login');
Route::post('/login', 'Apv\AuthController@cek_auth');
Route::get('/logout', 'Apv\AuthController@logout');

Route::get('storage/{filename}', function ($filename)
{
    $path = 'http://api.simkug.com/api/apv/storage/'.$fileName;
    return Response::download($path);   
});

Route::get('/karyawan', 'Apv\KaryawanController@index');
Route::post('/karyawan', 'Apv\KaryawanController@store');
Route::get('/karyawan/{id}', 'Apv\KaryawanController@show');
Route::post('/karyawan/{id}','Apv\KaryawanController@update');
Route::delete('/karyawan/{id}','Apv\KaryawanController@destroy');

Route::get('/unit', 'Apv\UnitController@index');
Route::post('/unit', 'Apv\UnitController@store');
Route::get('/unit/{id}', 'Apv\UnitController@show');
Route::put('/unit/{id}','Apv\UnitController@update');
Route::delete('/unit/{id}','Apv\UnitController@destroy');

Route::get('/jabatan', 'Apv\JabatanController@index');
Route::post('/jabatan', 'Apv\JabatanController@store');
Route::get('/jabatan/{kode_jab}', 'Apv\JabatanController@show');
Route::put('/jabatan/{kode_jab}','Apv\JabatanController@update');
Route::delete('/jabatan/{kode_jab}','Apv\JabatanController@destroy');
