<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/', 'Webesaku\WebController@index');
Route::get('/produk', 'Webesaku\WebController@produk');

?>