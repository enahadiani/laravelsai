<?php 

// Data Produk //
Route::get('produk', 'AdmJava\ProdukController@index');
Route::get('produk-show', 'AdmJava\ProdukController@getData');
Route::post('produk', 'AdmJava\ProdukController@store');
Route::post('produk-ubah', 'AdmJava\ProdukController@update');
Route::delete('produk', 'AdmJava\ProdukController@delete');

?>