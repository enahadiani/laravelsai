<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/', 'Webjava\Webv2Controller@home');
Route::get('/home', 'Webjava\Webv2Controller@home');
Route::get('/product', 'Webjava\Webv2Controller@product');
Route::get('/perusahaan', 'Webjava\Webv2Controller@perusahaan');

?>