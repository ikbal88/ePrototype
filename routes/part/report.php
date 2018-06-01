<?php

Route::get('export_material', 'ReportController@export_material')->name('export.material');
Route::get('export_warna', 'ReportController@export_warna')->name('export.warna');
Route::get('export_satuan', 'ReportController@export_satuan')->name('export.satuan');
Route::get('export_proses', 'ReportController@export_proses')->name('export.proses');
Route::get('export_jenis_barang', 'ReportController@export_jenis_barang')->name('export.jenis_barang');
Route::get('export_barang', 'ReportController@export_barang')->name('export.barang');
Route::get('export_supplier', 'ReportController@export_suppier')->name('export.suppier');
Route::get('export_costumer', 'ReportController@export_costumer')->name('export.costumer');
Route::get('export_role', 'ReportController@export_role')->name('export.role');

Route::get('/work_in_process', 'ReportController@work_in_process');
Route::get('/stock_a', 'ReportController@stock_a');
Route::get('/stock_a_api', 'ReportController@stock_a_api')->name('stock_a.api');
Route::get('/stock_b', 'ReportController@stock_b');
Route::get('/koreksi_stock', 'ReportController@koreksi_stock');
Route::get('/rekap_penjualan', 'ReportController@rekap_penjualan');
