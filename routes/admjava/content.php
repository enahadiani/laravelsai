<?php 

// Data Produk //
Route::get('produk', 'AdmJava\ProdukController@index');
Route::get('produk-show', 'AdmJava\ProdukController@getData');
Route::post('produk', 'AdmJava\ProdukController@store');
Route::put('vendor-ubah', 'Java\VendorController@update');
Route::delete('vendor', 'Java\VendorController@delete');

?>