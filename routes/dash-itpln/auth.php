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
        return view('dash-itpln.sesi');
    }else{
        return view('dash-itpln.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('dash-itpln.sesi');
});

Route::get('/cek_session', 'DashItpln\AuthController@cek_session');
Route::get('/', 'DashItpln\AuthController@index');
Route::get('/dash', 'DashItpln\AuthController@index');
Route::get('/menu', 'DashItpln\AuthController@getMenu');
Route::get('/login', 'DashItpln\AuthController@login');
Route::post('/login', 'DashItpln\AuthController@cek_auth');
Route::get('/logout', 'DashItpln\AuthController@logout');

Route::get('/profile', 'DashItpln\AuthController@getProfile');
Route::post('/update-password', 'DashItpln\AuthController@updatePassword');
Route::post('/update-foto', 'DashItpln\AuthController@updatePhoto');
Route::post('/update-background', 'DashItpln\AuthController@updateBackground');

Route::get('notif','DashItpln\NotifController@getNotif');
Route::post('notif-update-status','DashItpln\NotifController@updateStatusRead');
Route::post('search-form','DashItpln\AuthController@searchForm');
Route::get('search-form-list','DashItpln\AuthController@searchFormList');
Route::get('search-form-list2','DashItpln\AuthController@searchFormList2');



