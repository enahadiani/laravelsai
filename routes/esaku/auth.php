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
        return redirect('esaku-auth/login');
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

Route::get('/tes', function () {
    return view('esaku.tes');
});

Route::get('/cropper', function () {
    return view('esaku.cropper');
});

Route::get('/cek_session', 'Esaku\AuthController@cek_session');
Route::get('/', 'Esaku\AuthController@index');
Route::get('/dash', 'Esaku\AuthController@index');
Route::get('/menu', 'Esaku\AuthController@getMenu');
Route::get('/login', 'Esaku\AuthController@login');
Route::post('/login', 'Esaku\AuthController@cek_auth');
Route::get('/logout', 'Esaku\AuthController@logout');


Route::get('/profile', 'Esaku\AuthController@getProfile');
Route::post('/update-password', 'Esaku\AuthController@updatePassword');
Route::post('/update-foto', 'Esaku\AuthController@updatePhoto');
Route::post('/update-background', 'Esaku\AuthController@updateBackground');

Route::get('notif','Esaku\NotifController@getNotif');
Route::post('notif-update-status','Esaku\NotifController@updateStatusRead');
Route::post('search-form','Esaku\AuthController@searchForm');
Route::get('search-form-list','Esaku\AuthController@searchFormList');
Route::get('search-form-list2','Esaku\AuthController@searchFormList2');



