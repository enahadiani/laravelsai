<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/', 'Webjava\Webv2Controller@home');
Route::get('/home', 'Webjava\Webv2Controller@home');
Route::get('/produk', 'Webjava\Webv2Controller@produk');
Route::get('/perusahaan', 'Webjava\Webv2Controller@perusahaan');

?>