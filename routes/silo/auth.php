<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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

Route::get('/profile', 'Apv\AuthController@getProfile');
Route::post('/update-password', 'Apv\AuthController@updatePassword');
