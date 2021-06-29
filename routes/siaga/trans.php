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

Route::get('app','Siaga\ApprovalController@index');
Route::get('app-aju','Siaga\ApprovalController@getPengajuan');
Route::get('app-detail','Siaga\ApprovalController@show');
Route::post('app','Siaga\ApprovalController@store');
Route::get('app-status','Siaga\ApprovalController@getStatus');
Route::get('app-preview','Siaga\ApprovalController@getPreview');