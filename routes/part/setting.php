<?php

// User Route
Route::get('user','SettingController@user_index')->name('user.index');
Route::get('user/api','SettingController@user_api')->name('user.api');
Route::post('user','SettingController@user_create')->name('user.create');
Route::get('user/{id}/edit','SettingController@user_edit')->name('user.edit');
Route::patch('user/{id}','SettingController@user_update')->name('user.update');
Route::delete('user/{id}','SettingController@user_delete')->name('user.delete');

// Profil Route
Route::get('profil','SettingController@profil_index')->name('profil.index');
Route::get('profil/api','SettingController@profil_api')->name('profil.api');
Route::post('profil','SettingController@profil_create')->name('profil.create');
Route::get('profil/edit','SettingController@profil_edit')->name('profil.edit');
Route::patch('profil/{id}','SettingController@profil_update')->name('profil.update');
Route::delete('profil/{id}','SettingController@profil_delete')->name('profil.delete');
