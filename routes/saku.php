<?php

use Illuminate\Support\Facades\Route;

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
    return view('saku.'.$id);
    
});

Route::get('/', 'Saku\AuthController@index');
Route::get('/dash', 'Saku\AuthController@index');
Route::get('/menu', 'Saku\AuthController@getMenu');
Route::get('/login', 'Saku\AuthController@login');
Route::post('/login', 'Saku\AuthController@cek_auth');
Route::get('/logout', 'Saku\AuthController@logout');

Route::get('/fs', 'Saku\FSController@index');
Route::post('/fs', 'Saku\FSController@store');
Route::get('/fs/{id}', 'Saku\FSController@show');
Route::put('/fs/{id}','Saku\FSController@update');
Route::delete('/fs/{id}','Saku\FSController@destroy');


Route::get('/masakun', 'Saku\MasakunController@index');
Route::post('/masakun', 'Saku\MasakunController@store');
Route::get('/masakun/{id}', 'Saku\MasakunController@show');
Route::put('/masakun/{id}','Saku\MasakunController@update');
Route::delete('/masakun/{id}','Saku\MasakunController@destroy');
Route::get('/curr', 'Saku\MasakunController@getCurrency');
Route::get('/modul', 'Saku\MasakunController@getModul');
Route::get('/flag_akun','Saku\MasakunController@getFlagAkun');
Route::get('/neraca/{kode_fs}','Saku\MasakunController@getNeraca');
Route::get('/fsgar','Saku\MasakunController@getFSGar');
Route::get('/neracagar/{kode_fs}','Saku\MasakunController@getNeracaGar');


