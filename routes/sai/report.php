<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('lap-tagihan/{customer}/{tagihan}', 'Sai\LaporanController@getDataTagihan');
