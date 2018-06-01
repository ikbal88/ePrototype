<?php

// PO Pembelian
Route::get('pembelian','TransaksiController@pembelian_index')->name('pembelian.index');
Route::post('pembelian','TransaksiController@pembelian_create')->name('pembelian.create');
Route::get('pembelian/{id}/view','TransaksiController@pembelian_view')->name('pembelian.view');
Route::get('pembelian/{id}/print','TransaksiController@pembelian_print')->name('pembelian.print');
Route::post('pembelian/acc','TransaksiController@pembelian_acc')->name('pembelian.acc');
Route::post('pembelian/cancel','TransaksiController@pembelian_cancel')->name('pembelian.cancel');
Route::get('pembelian/api','TransaksiController@pembelian_api')->name('pembelian.api');

// PO Maklon
Route::get('maklon','TransaksiController@maklon_index')->name('maklon.index');
Route::post('maklon','TransaksiController@maklon_create')->name('maklon.create');
Route::get('maklon/{id}/view','TransaksiController@maklon_view')->name('maklon.view');
Route::get('maklon/{id}/print','TransaksiController@maklon_print')->name('maklon.print');
Route::post('maklon/acc','TransaksiController@maklon_acc')->name('maklon.acc');
Route::post('maklon/cancel','TransaksiController@maklon_cancel')->name('maklon.cancel');
Route::get('maklon/api','TransaksiController@maklon_api')->name('maklon.api');

// Surat Jalan
Route::get('surat_jalan', 'TransaksiController@surat_jalan_index')->name('surat_jalan.index');
Route::post('surat_jalan_create','TransaksiController@surat_jalan_create')->name('surat_jalan.create');
Route::get('surat_jalan/{id}/view','TransaksiController@surat_jalan_view')->name('surat_jalan.view');
Route::get('surat_jalan/{id}/print','TransaksiController@surat_jalan_print')->name('surat_jalan.print');
Route::post('surat_jalan/acc','TransaksiController@surat_jalan_acc')->name('surat_jalan.acc');
Route::post('surat_jalan/cancel','TransaksiController@surat_jalan_cancel')->name('surat_jalan.cancel');
Route::get('surat_jalan/api','TransaksiController@surat_jalan_api')->name('surat_jalan.api');

// Surat Masuk
Route::get('surat_masuk', 'TransaksiController@surat_masuk_index')->name('surat_masuk.index');
Route::post('surat_masuk_create','TransaksiController@surat_masuk_create')->name('surat_masuk.create');
Route::get('surat_masuk/{id}/view','TransaksiController@surat_masuk_view')->name('surat_masuk.view');
Route::get('surat_masuk/{id}/print','TransaksiController@surat_masuk_print')->name('surat_masuk.print');
Route::post('surat_masuk/acc','TransaksiController@surat_masuk_acc')->name('surat_masuk.acc');
Route::post('surat_masuk/cancel','TransaksiController@surat_masuk_cancel')->name('surat_masuk.cancel');
Route::get('surat_masuk/api','TransaksiController@surat_masuk_api')->name('surat_masuk.api');

// Penjualan
Route::get('trans','TransaksiController@trans_index')->name('trans.index');
Route::post('trans','TransaksiController@trans_create')->name('trans.create');
Route::get('trans/{id}/view','TransaksiController@trans_view')->name('trans.view');
Route::get('trans/{id}/print','TransaksiController@trans_print')->name('trans.print');
Route::post('trans/acc','TransaksiController@trans_acc')->name('trans.acc');
Route::post('trans/cancel','TransaksiController@trans_cancel')->name('trans.cancel');
Route::get('trans/api','TransaksiController@trans_api')->name('trans.api');
