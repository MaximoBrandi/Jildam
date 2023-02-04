<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;

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


Route::controller(RoutesController::class)->group(function(){

    Route::get('/', 'index')->name('index');

    Route::get('/login', 'login')->name('login');

    Route::get('/register', 'register')->name('register');

});
