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

Route::get('app','Sukka\ApprovalController@index');
Route::get('app-aju','Sukka\ApprovalController@getPengajuan');
Route::get('app-detail','Sukka\ApprovalController@show');
Route::post('app','Sukka\ApprovalController@store');
Route::get('app-status','Sukka\ApprovalController@getStatus');
Route::get('app-preview','Sukka\ApprovalController@getPreview');

Route::post('send-email','Sukka\ApprovalController@sendEmail');