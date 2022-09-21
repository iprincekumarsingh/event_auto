<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\web\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index_login')->name('auth.index');
    Route::POST('/auth', 'login')->name('auth.login');
    Route::get('/singup', 'signup')->name('auth.singup');
    Route::post('/register', 'create_acocunt')->name('auth.register');
});

Route::controller(WebController::class)->group(function () {
    Route::get('/home', 'dashboard');
    Route::get('pay', 'paytest');
    Route::get('payment', 'store');
});


Route::controller(AdminController::class)->group(function () {

    Route::get('/scanner','scanner');
    Route::get('/ticketCollector','reserve');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/get', function () {
});
