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

    Route::post('/pay', 'pay');
    Route::get('/addname', 'addName');
    Route::get('/contact-us', 'contact');

    Route::post('/contactQuery', 'contactSend');



    Route::get('/terms-conditions', 'termsCondtions');
    Route::get('/privacy-policy', 'privacyPolicy');
    Route::get('/refund-cancellation', 'RefundCancellation');
});



Route::controller(AdminController::class)->group(function () {

    Route::get('/scanner', 'scanner');
    Route::get('/ticketCollector', 'reserve');
});
Route::get('pick', function () {
    return view('web.pickuppoint');
});


Route::get('/mail', function () {
    session()->put('name', "Prince Kumar Singh");
    session()->put('ticketlink', 'https://hpanel.hostinger.com/email/divelink.in/setup-devices');


    Mail::to('princekumar2000.pks@gmail.com')->send(new TicketGeneartionMail());
});
Route::get('/generate', function () {
    $time = time();

    // create a folder
    if (!\File::exists(public_path('images'))) {
        \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
    }

    QrCode::generate("Testing id", 'images/' . $time . '.svg');

    $img_url = 'images/' . $time . '.svg';

    session()->put('qrImage', $img_url);
    echo session('qrImage');

    // return view('qr');
});
Route::get('/m/{pay_id}/{name}/{email}', function ($pay_id, $name, $email) {
    $time = time();

    // create a folder
    if (!\File::exists(public_path('images'))) {
        \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
    }
    session()->put('name', $name);
    QrCode::size(500)->format('png')->generate($pay_id, 'images/' . $time . '.png');

    // QrCode::format('png')
    $img_url = 'images/' . $time . '.png';

    session()->put('qrImage', $img_url);
    Mail::to($email)->send(new TicketGeneartionMail());
    return view('email.ticketGeneration');
});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard','index');
});
