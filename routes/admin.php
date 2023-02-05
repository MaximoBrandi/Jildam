<?php

use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->middleware('guest')->name('index');

    Route::get('/index', 'index')->middleware('guest')->name('index');

    Route::get('/main', 'main')->middleware('auth')->name('main');

    Route::get('/passwords', 'passwords')->middleware('auth')->name('passwords');

    Route::get('/profiles', 'profiles')->middleware('auth')->name('profiles');
});
