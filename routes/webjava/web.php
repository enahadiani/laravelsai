<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
    // if(!Session::has('isLoggedIn')){
    //     return redirect('webjava/login')->with('alert','Session telah habis !');
    // }else{
        return view('webjava.'.$id);
    // }
});

Route::get('/form/{id}/{kode}/{name}', function ($id,$kode,$name) {
    // if(!Session::has('isLoggedIn')){
    //     return redirect('webjava/login')->with('alert','Session telah habis !');
    // }else{
        $data['page'] = $kode;
        return view('webjava.'.$id,$data);
    // }
});

Route::get('/', 'Webjava\WebController@index');
Route::get('/menu', 'Webjava\WebController@getMenu');
Route::get('/gallery', 'Webjava\WebController@getGallery');
Route::get('/kontak', 'Webjava\WebController@getKontak');
Route::get('/page/{id}', 'Webjava\WebController@getPage');




