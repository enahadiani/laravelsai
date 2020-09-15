<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Jurnal Sesuai //
Route::get('jurnal-sesuai', 'Yakes\JurnalSesuaiController@index');