<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('data-fp-box', 'DashYpt\DashboardFPController@getDataBoxFirst');
Route::get('data-fp-pdpt', 'DashYpt\DashboardFPController@getDataBoxPdpt');
Route::get('data-fp-beban', 'DashYpt\DashboardFPController@getDataBoxBeban');

?>