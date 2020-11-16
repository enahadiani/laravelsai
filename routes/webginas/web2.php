<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form/{id}', function ($id) {
    $param['view'] = 'webginas.'.$id;
    $param['data'] = [];
    $param['menu'] = $id;
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});
Route::get('/', 'Webginas\Web2Controller@index');
Route::get('/perusahaan', 'Webginas\Web2Controller@viewPerusahaan');
Route::get('/kontak', 'Webginas\Web2Controller@viewKontak');
Route::get('/berita', 'Webginas\Web2Controller@viewBerita');
Route::get('/berita/isi-berita', 'Webginas\Web2Controller@viewContentBerita');
Route::get('/layanan/outsourcing', 'Webginas\Web2Controller@viewContentLayanan');
Route::get('/layanan/outsourcing/security', 'Webginas\Web2Controller@viewContentSecurity');
Route::get('/layanan/outsourcing/cleaning-service', 'Webginas\Web2Controller@viewContentCleaningService');
Route::get('/layanan/outsourcing/tenaga-ahli', 'Webginas\Web2Controller@viewContentTenagaAhli');
Route::get('/layanan/trading-bussiness-retail/catering', 'Webginas\Web2Controller@viewContentCatering');
Route::get('/layanan/trading-bussiness-retail/inovasi', 'Webginas\Web2Controller@viewContentInovasiTeknologi');
Route::get('/layanan/property/rental-car', 'Webginas\Web2Controller@viewContentRentalCar');
Route::get('/layanan/property/building-maintenance', 'Webginas\Web2Controller@viewContentBuildingMaintenance');
