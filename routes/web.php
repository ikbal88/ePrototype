<?php

include_once 'part/master.php';
include_once 'part/transaksi.php';
include_once 'part/report.php';
include_once 'part/setting.php';
include_once 'part/general.php';
include_once 'part/verify.php';


Route::get('/', function () {
    $profile = \App\Param::all();
    return view('welcome',['profile'=>$profile]);
});

Route::get('/home', function () {
    return view('dashboard');
});


Route::get('/cc', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();
Route::get('/dashboard', 'HomeController@index');
