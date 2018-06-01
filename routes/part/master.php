<?php

// Material Route
Route::get('material','MasterController@material_index')->name('material.index');
Route::get('material/api','MasterController@material_api')->name('material.api');
Route::post('material','MasterController@material_create')->name('material.create');
Route::get('material/{id}/edit','MasterController@material_edit')->name('material.edit');
Route::patch('material/{id}','MasterController@material_update')->name('material.update');
Route::delete('material/{id}','MasterController@material_delete')->name('material.delete');
// Warna Route
Route::get('warna','MasterController@warna_index')->name('warna.index');
Route::get('warna/api','MasterController@warna_api')->name('warna.api');
Route::post('warna','MasterController@warna_create')->name('warna.create');
Route::get('warna/{id}/edit','MasterController@warna_edit')->name('warna.edit');
Route::patch('warna/{id}','MasterController@warna_update')->name('warna.update');
Route::delete('warna/{id}','MasterController@warna_delete')->name('warna.delete');
// Satuan Route
Route::get('satuan','MasterController@satuan_index')->name('satuan.index');
Route::get('satuan/api','MasterController@satuan_api')->name('satuan.api');
Route::post('satuan','MasterController@satuan_create')->name('satuan.create');
Route::get('satuan/{id}/edit','MasterController@satuan_edit')->name('satuan.edit');
Route::patch('satuan/{id}','MasterController@satuan_update')->name('satuan.update');
Route::delete('satuan/{id}','MasterController@satuan_delete')->name('satuan.delete');
// Proses Route
Route::get('proses','MasterController@proses_index')->name('proses.index');
Route::get('proses/api','MasterController@proses_api')->name('proses.api');
Route::post('proses','MasterController@proses_create')->name('proses.create');
Route::get('proses/{id}/edit','MasterController@proses_edit')->name('proses.edit');
Route::patch('proses/{id}','MasterController@proses_update')->name('proses.update');
Route::delete('proses/{id}','MasterController@proses_delete')->name('proses.delete');
// Barang Route
Route::get('barang','MasterController@barang_index')->name('barang.index');
Route::get('barang/api','MasterController@barang_api')->name('barang.api');
Route::post('barang','MasterController@barang_create')->name('barang.create');
Route::get('barang/{id}/edit','MasterController@barang_edit')->name('barang.edit');
Route::patch('barang/{id}','MasterController@barang_update')->name('barang.update');
Route::delete('barang/{id}','MasterController@barang_delete')->name('barang.delete');

Route::get('supplier','MasterController@supplier_index')->name('supplier.index');
Route::get('supplier/api','MasterController@supplier_api')->name('supplier.api');
Route::post('supplier','MasterController@supplier_create')->name('supplier.create');
Route::get('supplier/{id}/edit','MasterController@supplier_edit')->name('supplier.edit');
Route::patch('supplier/{id}','MasterController@supplier_update')->name('supplier.update');
Route::delete('supplier/{id}','MasterController@supplier_delete')->name('supplier.delete');

Route::get('costumer','MasterController@costumer_index')->name('costumer.index');
Route::get('costumer/api','MasterController@costumer_api')->name('costumer.api');
Route::post('costumer','MasterController@costumer_create')->name('costumer.create');
Route::get('costumer/{id}/edit','MasterController@costumer_edit')->name('costumer.edit');
Route::patch('costumer/{id}','MasterController@costumer_update')->name('costumer.update');
Route::delete('costumer/{id}','MasterController@costumer_delete')->name('costumer.delete');

Route::get('jenis_barang','MasterController@jenis_barang_index')->name('jenis_barang.index');
Route::get('jenis_barang/api','MasterController@jenis_barang_api')->name('jenis_barang.api');
Route::post('jenis_barang','MasterController@jenis_barang_create')->name('jenis_barang.create');
Route::get('jenis_barang/{id}/edit','MasterController@jenis_barang_edit')->name('jenis_barang.edit');
Route::patch('jenis_barang/{id}','MasterController@jenis_barang_update')->name('jenis_barang.update');
Route::delete('jenis_barang/{id}','MasterController@jenis_barang_delete')->name('jenis_barang.delete');

// Route Role
Route::get('role','MasterController@role_index')->name('role.index');
Route::get('role/api','MasterController@role_api')->name('role.api');
Route::post('role','MasterController@role_create')->name('role.create');
Route::get('role/{id}/edit','MasterController@role_edit')->name('role.edit');
Route::patch('role/{id}','MasterController@role_update')->name('role.update');
Route::delete('role/{id}','MasterController@role_delete')->name('role.delete');
