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
        return view('dash-ypt.sesi');
    }else{
        return view('dash-ypt.'.$id);
    }
});

Route::get('cek-sesi', function () {
    $sesi =  Session::all();
    if(!Session::get('login')){
        return response()->json(['status'=>false, 'session' => $sesi], 200);
    }
    else{
        return response()->json(['status'=>true, 'session' => $sesi], 200);
    }
});

Route::get('main2', function () {
    return view('dash-ypt.main2');
});

Route::get('/sesi-habis', function () {
    return view('dash-ypt.sesi');
});

Route::get('/cek_session', 'DashYpt\AuthController@cek_session');
Route::get('/', 'DashYpt\AuthController@index');
Route::get('/dash', 'DashYpt\AuthController@index');
Route::get('/menu', 'DashYpt\AuthController@getMenu');
Route::get('/login', 'DashYpt\AuthController@login');
Route::post('/login', 'DashYpt\AuthController@cek_auth');
Route::get('/logout', 'DashYpt\AuthController@logout');

Route::get('/profile', 'DashYpt\AuthController@getProfile');
Route::post('/update-password', 'DashYpt\AuthController@updatePassword');
Route::post('/update-foto', 'DashYpt\AuthController@updatePhoto');
Route::post('/update-background', 'DashYpt\AuthController@updateBackground');

Route::get('notif','DashYpt\NotifController@getNotif');
Route::post('notif-update-status','DashYpt\NotifController@updateStatusRead');
Route::post('search-form','DashYpt\AuthController@searchForm');
Route::get('search-form-list','DashYpt\AuthController@searchFormList');
Route::get('search-form-list2','DashYpt\AuthController@searchFormList2');



