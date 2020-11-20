<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Data Konten //
Route::get('konten', 'AdmGinas\KontenController@index');
Route::get('konten/{id}', 'AdmGinas\KontenController@show');
Route::post('konten', 'AdmGinas\KontenController@store');
Route::put('konten/{id}', 'AdmGinas\KontenController@update');
Route::delete('konten/{id}', 'AdmGinas\KontenController@destroy');
Route::get('konten-header', 'AdmGinas\KontenController@getHeader');
Route::get('konten-klp', 'AdmGinas\KontenController@getKlp');
Route::get('konten-kategori', 'AdmGinas\KontenController@getKategori');

// Data Kategori Galeri //
Route::get('kategori-galeri', 'AdmGinas\KategoriGaleriController@index');
Route::get('kategori-galeri/{id}', 'AdmGinas\KategoriGaleriController@show');
Route::post('kategori-galeri', 'AdmGinas\KategoriGaleriController@store');
Route::put('kategori-galeri/{id}', 'AdmGinas\KategoriGaleriController@update');
Route::delete('kategori-galeri/{id}', 'AdmGinas\KategoriGaleriController@destroy');

// Data Kontak //
Route::get('kontak', 'AdmGinas\KontakController@index');
Route::get('kontak/{id}', 'AdmGinas\KontakController@show');
Route::post('kontak', 'AdmGinas\KontakController@store');
Route::put('kontak/{id}', 'AdmGinas\KontakController@update');
Route::delete('kontak/{id}', 'AdmGinas\KontakController@destroy');

// Data Galeri //
Route::get('galeri', 'AdmGinas\GaleriController@index');
Route::get('galeri/{id}', 'AdmGinas\GaleriController@show');
Route::post('galeri', 'AdmGinas\GaleriController@store');
Route::post('galeri/{id}', 'AdmGinas\GaleriController@update');
Route::delete('galeri/{id}', 'AdmGinas\GaleriController@destroy');

//Menu Web
Route::get('menu-web','AdmGinas\MenuWebController@index');
Route::post('menu-web','AdmGinas\MenuWebController@store');
Route::put('menu-web','AdmGinas\MenuWebController@update');
Route::delete('menu-web','AdmGinas\MenuWebController@destroy');
Route::get('menu-web-form','AdmGinas\MenuWebController@getForm');
Route::post('menu-web-move','AdmGinas\MenuWebController@simpanMove');

// Data Banner //
Route::get('banner', 'AdmGinas\BannerController@index');
Route::get('banner/{id}', 'AdmGinas\BannerController@show');
Route::post('banner', 'AdmGinas\BannerController@store');
Route::post('galeri/{id}', 'AdmGinas\GaleriController@update');
Route::delete('galeri/{id}', 'AdmGinas\GaleriController@destroy');

// Data Klien //
Route::get('klien', 'AdmGinas\KlienController@index');
Route::get('klien/{id}', 'AdmGinas\KlienController@show');
Route::post('klien', 'AdmGinas\KlienController@store');
Route::post('klien/{id}', 'AdmGinas\KlienController@update');
// Route::delete('galeri/{id}', 'AdmGinas\GaleriController@destroy');

// Data Review //
Route::get('review', 'AdmGinas\ReviewKlienController@index');
Route::get('review/{id}', 'AdmGinas\ReviewKlienController@show');
Route::post('review', 'AdmGinas\ReviewKlienController@store');
Route::post('review/{id}', 'AdmGinas\ReviewKlienController@update');

// Data Profil //
Route::get('profil', 'AdmGinas\ProfilPerusahaanController@index');
Route::post('profil', 'AdmGinas\ProfilPerusahaanController@store');

// Data Info //
Route::get('info', 'AdmGinas\InfoController@index');
Route::get('info-show/{id}', 'AdmGinas\InfoController@show');
Route::post('info-simpan', 'AdmGinas\InfoController@store');
Route::post('info-ubah/{id}', 'AdmGinas\InfoController@update');
