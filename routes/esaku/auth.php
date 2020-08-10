<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
        return redirect('esaku-auth/login')->with('alert','Session telah habis !');
    }else{
        return view('esaku.'.$id);
    }
});

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('esaku.sesi');
    }else{
        return view('esaku.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('esaku.sesi');
});

Route::get('/cek_session', 'Esaku\AuthController@cek_session');
Route::get('/', 'Esaku\AuthController@index');
Route::get('/dash', 'Esaku\AuthController@index');
Route::get('/menu', 'Esaku\AuthController@getMenu');
Route::get('/login', 'Esaku\AuthController@login');
Route::post('/login', 'Esaku\AuthController@cek_auth');
Route::get('/logout', 'Esaku\AuthController@logout');



