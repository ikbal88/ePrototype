<?php
Route::get('verify_pembelian','VerifyController@verify_pembelian_index')->name('verify_pembelian.index');
Route::get('verify_maklon','VerifyController@verify_maklon_index')->name('verify_maklon.index');
Route::get('verify_surat_jalan','VerifyController@verify_surat_jalan_index')->name('verify_surat_jalan.index');
Route::get('verify_surat_masuk','VerifyController@verify_surat_masuk_index')->name('verify_surat_masuk.index');
