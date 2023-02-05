<?php

use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(RoutesController::class)->group(function () {
    Route::get('/', 'index')->middleware('guest')->name('index');

    Route::get('/main', 'main')->middleware('auth')->name('main');

    Route::get('/passwords', 'passwords')->middleware('auth')->name('passwords');

    Route::post('/passwords', 'insert')->middleware('auth')->name('insert');

    Route::get('/profile', 'profile')->middleware('auth')->name('profile');
});


require __DIR__.'/auth.php';
