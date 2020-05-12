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

?>