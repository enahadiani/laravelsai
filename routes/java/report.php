<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('filter-kartu-tagihan', 'Java\HelperController@getKartuBukti');

Route::post('lap-kartu-proyek', 'Java\LaporanController@getKartuProyek');

?>