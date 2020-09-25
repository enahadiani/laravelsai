<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Bonus //
Route::get('bonus', 'Esaku\BonusController@index');
Route::get('bonus/{id}', 'Esaku\BonusController@getData');
Route::post('bonus', 'Esaku\BonusController@store');
Route::put('bonus/{id}', 'Esaku\BonusController@update');
Route::delete('bonus/{id}', 'Esaku\BonusController@delete');
