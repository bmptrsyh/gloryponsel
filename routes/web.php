<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\auth\GoogleController;
use App\Http\Controllers\Customer\auth\FacebookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Customer\auth\OTPResetPasswordController;
use App\Http\Controllers\Admin\PonselController as AdminPonselController;
use App\Http\Controllers\Customer\PonselController as CustomerPonselController;


// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');

Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');




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

Route::middleware(['auth:web'])->prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [CustomerPonselController::class, 'index'])->name('index');
    Route::get('/{id}', [CustomerPonselController::class, 'show'])->name('show');
});

// Middleware Auth untuk halaman yang membutuhkan login
Route::middleware('auth:web')->group(function () {
    Route::post('/beli-ponsel/{id}', [PonselController::class, 'beliPonsel'])->name('beli.ponsel');
    Route::get('/transaksi', [PonselController::class, 'transaksi'])->name('transaksi.index');
});

// Dashboard Admin
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     Route::get('/admin/produk', [DashboardController::class, 'produk'])->name('produk.admin');
//     Route::get('/ponsel/create', [PonselController::class, 'index'])->name('ponsel.create');
//     Route::post('/ponsel', [PonselController::class, 'store'])->name('ponsel.store');
//     Route::put('/ponsel/{id}', [PonselController::class, 'update'])->name('ponsel.update');
//     Route::get('/ponsel/{id}/edit', [PonselController::class, 'edit'])->name('ponsel.edit');
// });

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Gunakan resource controller untuk ponsel
    Route::resource('ponsel', AdminPonselController::class)->names('ponsel');
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