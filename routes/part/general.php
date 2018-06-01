<?php

Route::get('/supplier_get', 'GeneralController@supplier_get');
Route::get('/costumer_get', 'GeneralController@costumer_get');
Route::get('/jenis_barang_get', 'GeneralController@jenis_barang_get');
Route::get('/warna_get', 'GeneralController@warna_get');
Route::get('/satuan_get', 'GeneralController@satuan_get');
Route::get('/material_get', 'GeneralController@material_get');
Route::get('/proses_get', 'GeneralController@proses_get');
Route::get('/role_get', 'GeneralController@role_get');

// PO GET
Route::get('/po_pembelian_get', 'GeneralController@po_pembelian_get');
Route::get('/po_maklon_get', 'GeneralController@po_maklon_get');

// GET NAME PRODUK
Route::post('/nama_barang_get', 'GeneralController@nama_barang_get');
