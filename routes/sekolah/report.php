<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-pp','Sekolah\FilterController@getFilterPP');
Route::get('filter-ta','Sekolah\FilterController@getFilterTA');
Route::get('filter-kelas','Sekolah\FilterController@getFilterKelas');
Route::get('filter-matpel','Sekolah\FilterController@getFilterMatpel');

