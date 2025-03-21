<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\OTPResetPasswordController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');
    Route::post('/logout', 'logout')->name('logout');
    // Autentikasi Google
    Route::get('/auth/google', 'redirectToGoogle')->name('google.login');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
    // Autentikasi Facebook
    Route::get('/auth/facebook', 'redirectToFacebook')->name('facebook.login');
    Route::get('/auth/facebook/callback', 'handleFacebookCallback');
});

// Middleware Auth untuk halaman yang membutuhkan login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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