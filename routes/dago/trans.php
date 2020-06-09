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
Route::get('jamaah', 'Dago\JamaahController@index');
Route::post('jamaah', 'Dago\JamaahController@store');
Route::get('jamaah-detail', 'Dago\JamaahController@show');
Route::put('jamaah-ubah','Dago\JamaahController@update');
Route::delete('jamaah','Dago\JamaahController@destroy');



