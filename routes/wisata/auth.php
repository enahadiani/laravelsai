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
        return redirect('wisata-auth/login');
    }else{
        return view('wisata.'.$id);
    }
});

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('wisata.sesi');
    }else{
        return view('wisata.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('wisata.sesi');
});

Route::get('/cek_session', 'wisata\AuthController@cek_session');
Route::get('/', 'wisata\AuthController@index');
Route::get('/dash', 'wisata\AuthController@index');
Route::get('/menu', 'wisata\AuthController@getMenu');
Route::get('/login', 'wisata\AuthController@login');
Route::post('/login', 'wisata\AuthController@cek_auth');
Route::get('/logout', 'wisata\AuthController@logout');


Route::get('/profile', 'wisata\AuthController@getProfile');
Route::post('/update-password', 'wisata\AuthController@updatePassword');
Route::post('/update-foto', 'wisata\AuthController@updatePhoto');
Route::post('/update-background', 'wisata\AuthController@updateBackground');

Route::get('notif','wisata\NotifController@getNotif');
Route::post('notif-update-status','wisata\NotifController@updateStatusRead');
Route::post('search-form','wisata\AuthController@searchForm');
Route::get('search-form-list','wisata\AuthController@searchFormList');
Route::get('search-form-list2','wisata\AuthController@searchFormList2');



