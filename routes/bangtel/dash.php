<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('periode', 'Bangtel\DashboardController@getPeriode');
Route::get('pp', 'Bangtel\DashboardController@getPP');
Route::get('project-box', 'Bangtel\DashboardController@getBoxProject');


?>