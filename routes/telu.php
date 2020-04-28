<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('telu/login')->with('alert','Session telah habis !');
    }else{
        return view('telu.'.$id);
    }
});

Route::get('/', 'Telu\AuthController@index');
Route::get('/login', 'Telu\AuthController@login');

?>