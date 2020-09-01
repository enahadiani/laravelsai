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
    return view('webginas.'.$id);
});

Route::get('/form/{id}/{kode}/{name}', function ($id,$kode,$name) {
    
    $data['page'] = $kode;
    return view('webginas.'.$id,$data);
});

Route::get('/news/{page}', function ($page) {
    
    $data['page'] = $page;
    return view('webginas.article',$data);
});

Route::get('/news/{page}/{bulan}/{tahun}', function ($page,$bulan,$tahun) {
    
    $data['page'] = $page;
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    return view('webginas.article',$data);
});

Route::get('/news-categories', function (Request $request) {
    
    $data['jenis'] = 'categories';
    $data['str'] = $request->str;
    return view('webginas.article',$data);
});

Route::get('/news-search', function (Request $request) {
    
    $data['jenis'] = 'string';
    $data['str'] = $request->str;
    return view('webginas.article',$data);
});

Route::get('read-item/{id}', function ($id) {
    $data['id'] = $id;
    return view('webginas.vItem',$data);
});

Route::get('/', 'Webginas\WebController@index');
Route::get('/menu', 'Webginas\WebController@getMenu');
Route::get('/gallery', 'Webginas\WebController@getGallery');
Route::get('/home-data', 'Webginas\WebController@getHome');
Route::get('/kontak', 'Webginas\WebController@getKontak');
Route::get('/page/{id}', 'Webginas\WebController@getPage');
Route::get('/news-data', 'Webginas\WebController@getNews');
Route::get('/article-data', 'Webginas\WebController@getArticle');
Route::get('/readitem/{id}', 'Webginas\WebController@readItem');


Route::get('/article/{page}', function ($page) {
    
    $data['page'] = $page;
    return view('webginas.article',$data);
});

Route::get('/article/{page}/{bulan}/{tahun}', function ($page,$bulan,$tahun) {
    
    $data['page'] = $page;
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    return view('webginas.article',$data);
});

Route::get('/article-categories', function (Request $request) {
    
    $data['jenis'] = 'categories';
    $data['str'] = $request->str;
    return view('webginas.article',$data);
});

Route::get('/article-search', function (Request $request) {
    
    $data['jenis'] = 'string';
    $data['str'] = $request->str;
    return view('webginas.article',$data);
});




