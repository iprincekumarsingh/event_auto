<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\web\WebController;
use App\Mail\DemoMail;
use App\Mail\TicketGeneartionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


Route::controller(AuthController::class)->group(function () {

    if (session('isLoggedIn') == 1) {
        return redirect('/');
    } else {
        Route::get('/login', 'index_login')->name('auth.index');
        Route::POST('/auth', 'login')->name('auth.login');
        Route::get('/singup', 'signup')->name('auth.singup');
        Route::post('/register', 'create_acocunt')->name('auth.register');
    }
});

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'homePage');
    Route::get('/home', 'dashboard');
    Route::get('pay', 'paytest');
    Route::get('payment', 'store');
    Route::get('/event/{eventName}/{id}', 'eventSingle');

    Route::get('/dashboard', 'userDashboard');
    Route::get('/logout', 'logout');
    Route::get('th', 'thankyou');


    Route::post('/pay','pay');
    Route::get('/addname','addName');
});


Route::controller(AdminController::class)->group(function () {

    Route::get('/scanner', 'scanner');
    Route::get('/ticketCollector', 'reserve');
});
