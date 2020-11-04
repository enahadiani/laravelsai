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
