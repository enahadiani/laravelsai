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
    if(!Session::has('isLoggedIn')){
        return redirect('saku/login')->with('alert','Session telah habis !');
    }else{
        return view('saku.'.$id);
    }
});


Route::get('/cek_session', 'Midtrans\AuthController@cek_session');
Route::get('/menu', 'Saku\AuthController@getMenu');
Route::get('/login', 'Midtrans\AuthController@login');
Route::post('/login', 'Midtrans\AuthController@cek_auth');
Route::get('/logout', 'Midtrans\AuthController@logout');

Route::get('/', 'Midtrans\AuthController@index')->name('midtrans');
Route::get('/finish', function(){
    return redirect()->route('midtrans');
})->name('donation.finish');

Route::get('/unfinish', function(){
    return redirect()->route('midtrans');
})->name('donation.unfinish');

Route::get('/error', function(){
    return redirect()->route('midtrans');
})->name('donation.error');
 
Route::post('/donation/store', 'Midtrans\DonasiController@store')->name('donation.store');
Route::get('/donation', 'Midtrans\DonasiController@index');
Route::post('/callback', 'Midtrans\DonasiController@notificationHandler')->name('notification.handler');
 