<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('filter-periodever', 'Bdh\FilterController@periodeVer');

Route::get('filter-nover', 'Bdh\FilterController@dataBuktiVer');

Route::post('lap-verifikasi', 'Bdh\LaporanController@dataVerifikasi');
?>