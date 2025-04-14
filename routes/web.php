<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PonselController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\OTPResetPasswordController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [PonselController::class, 'produk'])->name('produk.view');
Route::get('/produk/{id}', [PonselController::class, 'show'])->name('produk.detail');


// Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(GoogleController::class)->group(function() {
    Route::get('/auth/google', 'redirectToGoogle')->name('google.login');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
});
Route::controller(FacebookController::class)->group(function() {
    Route::get('/auth/facebook', 'redirectToFacebook')->name('facebook.login');
    Route::get('/auth/facebook/callback', 'handleFacebookCallback');
});

// Middleware Auth untuk halaman yang membutuhkan login
Route::middleware('auth:web')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.login');
});

// Dashboard Admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/produk', [DashboardController::class, 'produk'])->name('produk');
    Route::get('/ponsel/create', [PonselController::class, 'index'])->name('ponsel.create');
Route::post('/ponsel', [PonselController::class, 'store'])->name('ponsel.store');
});

// Lupa & Reset Password
Route::controller(OTPResetPasswordController::class)->group(function () {
    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', 'sendOTP')->name('password.otp.send');

    Route::get('verify-otp', function () {
        return view('auth.verify-otp');
    })->name('password.otp.verify.form');

    Route::post('verify-otp', 'verifyOTP')->name('password.otp.verify');

    Route::get('/reset-password', function () {
        return view('auth.reset-password', ['email' => request()->query('email')]);
    })->name('password.reset.form');

    Route::post('reset-password', 'resetPassword')->name('password.update');
});