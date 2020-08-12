<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('periode', 'Sai\HelperController@getPeriode');
Route::post('lap-tagihan', 'Sai\LaporanController@getDataTagihan');
