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
Route::post('/login', 'Telu\AuthController@cek_auth');
Route::get('/logout', 'Telu\AuthController@logout');
Route::get('/menu', 'Telu\AuthController@getMenu');

//Dashboard
Route::get('/getRKAVSReal/{periode}','Telu\DashboardController@getRKAVSReal');


?>