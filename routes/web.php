<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\web\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index_login')->name('auth.index');
    Route::get('/auth', 'login')->name('auth.index');
    Route::get('/singup', 'signup')->name('auth.index');
    Route::get('/register', 'create_acocunt')->name('auth.index');
});

Route::controller(WebController::class)->group(function(){
    Route::get('/home','dashboard');
});
