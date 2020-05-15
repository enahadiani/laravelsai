<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('tarbak/login')->with('alert','Session telah habis !');
    }else{
        return view('tarbak.'.$id);
    }
});

Route::get('/', 'Tarbak\AuthController@index');
Route::get('/login', 'Tarbak\AuthController@login');
Route::post('/login', 'Tarbak\AuthController@cek_auth');
Route::get('/logout', 'Tarbak\AuthController@logout');
Route::get('/menu', 'Tarbak\AuthController@getMenu');

Route::get('/getPP', 'Tarbak\PPController@getPP');
Route::get('/getTingkatan', 'Tarbak\TingkatanController@getTingkatan');

Route::get('/getAngkatan', 'Tarbak\AngkatanController@index');
Route::get('/getAngkatan/{kode_akt1}/{kode_akt2}/{kode_pp}', 'Tarbak\AngkatanController@getAngkatan');
Route::post('/postAngkatan', 'Tarbak\AngkatanController@save');
Route::put('/postAngkatan/{kode_akt1}/{kode_akt2}', 'Tarbak\AngkatanController@update');
Route::delete('/deleteAngkatan/{kode_akt1}/{kode_akt2}/{kode_pp}', 'Tarbak\AngkatanController@delete');

Route::get('/getTahunAjaran', 'Tarbak\TahunAjaranController@index');
Route::get('/getTahunAjaran/{kode_ta1}/{kode_ta2}/{kode_pp}', 'Tarbak\TahunAjaranController@getTahunAjaran');
Route::post('/postTahunAjaran', 'Tarbak\TahunAjaranController@save');
Route::put('/postTahunAjaran/{kode_ta1}/{kode_ta2}', 'Tarbak\TahunAjaranController@update');
Route::delete('/deleteTahunAjaran/{kode_ta1}/{kode_ta2}/{kode_pp}', 'Tarbak\TahunAjaranController@delete');

Route::get('/getJurusan', 'Tarbak\JurusanController@index');
Route::get('/getJurusan/{kode_jur}/{kode_pp}', 'Tarbak\JurusanController@getJurusan');
Route::post('/postJurusan', 'Tarbak\JurusanController@save');
Route::put('/postJurusan/{kode_jur}', 'Tarbak\JurusanController@update');
Route::delete('/deleteJurusan/{kode_jur}/{kode_pp}', 'Tarbak\JurusanController@delete');

Route::get('/getKelas', 'Tarbak\KelasController@index');
Route::get('/getKelas/{kode_jur}/{kode_pp}', 'Tarbak\KelasController@getKelas');
Route::post('/postKelas', 'Tarbak\KelasController@save');
Route::put('/postKelas/{kode_jur}', 'Tarbak\KelasController@update');
Route::delete('/deleteKelas/{kode_jur}/{kode_pp}', 'Tarbak\KelasController@delete');

?>