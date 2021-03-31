<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('notif-billing-periode', 'Ts\NotifBillingController@getPeriode');
Route::get('notif-billing-nobill', 'Ts\NotifBillingController@getNoBill');
Route::get('notif-billing', 'Ts\NotifBillingController@index');
Route::get('notif-billing-detail', 'Ts\NotifBillingController@show');
Route::post('notif-billing', 'Ts\NotifBillingController@store');
Route::post('notif-billing-ubah', 'Ts\NotifBillingController@update');
Route::delete('notif-billing', 'Ts\NotifBillingController@destroy');