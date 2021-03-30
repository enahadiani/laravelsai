<?php 

// Data Produk //
Route::get('produk', 'AdmJava\ProdukController@index');
Route::get('vendor-show', 'Java\VendorController@getData');
Route::get('vendor-check', 'Java\VendorController@isUnik');
Route::post('vendor', 'Java\VendorController@store');
Route::put('vendor-ubah', 'Java\VendorController@update');
Route::delete('vendor', 'Java\VendorController@delete');

?>