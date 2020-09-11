<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Masakun //
Route::get('masakun', 'Yakes\MasakunController@index');
Route::get('masakun/{id}', 'Yakes\MasakunController@getData');
Route::post('masakun', 'Yakes\MasakunController@store');
Route::put('masakun/{id}', 'Yakes\MasakunController@update');
Route::delete('masakun/{id}', 'Yakes\MasakunController@delete');

// Data FS //
Route::get('fs', 'Yakes\FSController@index');
Route::get('fs/{id}', 'Yakes\FSController@getData');
Route::post('fs', 'Yakes\FSController@store');
Route::put('fs/{id}', 'Yakes\FSController@update');
Route::delete('fs/{id}', 'Yakes\FSController@delete');