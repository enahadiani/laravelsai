<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('notif-billing-periode', 'Ts\NotifBillingController@getPeriode');
Route::get('notif-billing-nobill', 'Ts\NotifBillingController@getNoBill');
Route::get('notif-billing', 'Ts\NotifBillingController@index');
Route::post('notif-billing', 'Ts\NotifBillingController@store');
Route::delete('notif-billing', 'Ts\NotifBillingController@destroy');

Route::get('notif-pembayaran-periode', 'Ts\NotifPembayaranController@getPeriode');
Route::get('notif-pembayaran-norekon', 'Ts\NotifPembayaranController@getNoRekon');
Route::get('notif-pembayaran', 'Ts\NotifPembayaranController@index');
Route::post('notif-pembayaran', 'Ts\NotifPembayaranController@store');
Route::delete('notif-pembayaran', 'Ts\NotifPembayaranController@destroy');