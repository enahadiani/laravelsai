<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Helper
Route::get('periode', 'Java\HelperController@getPeriode');

Route::get('beban-unpaid', 'Java\DashboardController@getBebanUnpaid');
Route::get('total-project', 'Java\DashboardController@getTotalProject');

?>