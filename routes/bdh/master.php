<?php

use Illuminate\Support\Facades\Route;


// jenis dokumen
Route::get('/jenis-dok', 'Bdh\JenisDokumenController@index');
