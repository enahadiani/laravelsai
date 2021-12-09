<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('data-fp-box', 'DashYpt\DashboardFPController@getDataBoxFirst');
Route::get('v2/data-fp-box', 'DashYpt\DashboardFPV2Controller@getDataBoxFirst');
Route::get('data-fp-pdpt', 'DashYpt\DashboardFPController@getDataBoxPdpt');
Route::get('v2/data-fp-pdpt', 'DashYpt\DashboardFPV2Controller@getDataPdpt');
Route::get('data-fp-beban', 'DashYpt\DashboardFPController@getDataBoxBeban');
Route::get('v2/data-fp-beban', 'DashYpt\DashboardFPV2Controller@getDataBeban');
Route::get('data-fp-shu', 'DashYpt\DashboardFPController@getDataBoxShu');
Route::get('v2/data-fp-shu', 'DashYpt\DashboardFPV2Controller@getDataShu');
Route::get('data-fp-or', 'DashYpt\DashboardFPController@getDataBoxShu');
Route::get('v2/data-fp-or', 'DashYpt\DashboardFPV2Controller@getDataOR');
Route::get('data-fp-lr', 'DashYpt\DashboardFPController@getDataBoxLabaRugi');
Route::get('data-fp-pl', 'DashYpt\DashboardFPController@getDataBoxPerformLembaga');

Route::get('data-fp-detail-perform', 'DashYpt\DashboardFPController@getDataPerformansiLembaga');
Route::get('data-fp-detail-lembaga', 'DashYpt\DashboardFPController@getDataPerLembaga');
Route::get('data-fp-detail-kelompok', 'DashYpt\DashboardFPController@getDataPerKelompok');
Route::get('data-fp-detail-akun', 'DashYpt\DashboardFPController@getDataPerAkun');
Route::get('data-fp-detail-or-5tahun', 'DashYpt\DashboardFPController@getDataOR5Tahun');

Route::get('data-ccr-box', 'DashYpt\DashboardCCRController@getDataBox');
Route::get('data-ccr-top', 'DashYpt\DashboardCCRController@getTopCCR');
Route::get('data-ccr-bidang', 'DashYpt\DashboardCCRController@getBidang');
Route::get('data-ccr-trend','DashYpt\DashboardCCRController@getTrendCCR');  
Route::get('data-ccr-trend-saldo','DashYpt\DashboardCCRController@getTrendSaldoPiutang');  

Route::get('data-cf-box', 'DashYpt\DashboardCFController@getDataBox');
Route::get('data-cf-chart-bulanan', 'DashYpt\DashboardCFController@getDataChartBulanan');

// INVEST

Route::get('data-inves-box', 'DashYpt\DashboardInvesController@getDataBox');
Route::get('data-inves-serap-agg', 'DashYpt\DashboardInvesController@getSerapAgg');
Route::get('data-inves-nilai-aset', 'DashYpt\DashboardInvesController@getNilaiAsetChart');
Route::get('data-inves-agg-lembaga','DashYpt\DashboardInvesController@getAggPerLembagaChart');  
// END INVEST

// RASIO

Route::get('data-rasio-jenis', 'DashYpt\DashboardRasioController@getKlpRasio');
Route::get('data-rasio-lembaga', 'DashYpt\DashboardRasioController@getLokasi');
Route::get('data-rasio-ytd', 'DashYpt\DashboardRasioController@getRasioYTD');
Route::get('data-rasio-yoy', 'DashYpt\DashboardRasioController@getRasioYoY');
Route::get('data-rasio-tahun', 'DashYpt\DashboardRasioController@getRasioTahun');

?>