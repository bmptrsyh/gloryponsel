<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function showLoginForm() {
        return view('login');
    }

    public function showRegisterForm() {
        return view('register');
    }

    public function login(LoginRequest $request)
{
    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

    // Coba login sebagai admin dulu
    if (Auth::guard('admin')->attempt([$loginType => $request->login, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    // Jika bukan admin, coba login sebagai pengguna
    if (Auth::guard('web')->attempt([$loginType => $request->login, 'password' => $request->password])) {
        $request->session()->regenerate();
        // return view ('home');
        return redirect()->intended('/home');
    }

    return back()->withErrors(['login' => 'Email atau password salah.']);
}

    
    // public function login(LoginRequest $request)
    // {
    //     // Tentukan apakah login menggunakan email atau nomor telepon
    //     $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

    //     // Ambil data pengguna berdasarkan email atau nomor telepon
    //     $user = Pengguna::where($loginType, $request->login)->first();

    //     // Jika pengguna tidak ditemukan (seharusnya sudah dicek di LoginRequest)
    //     if (!$user) {
    //         return back()->withErrors(['login' => 'Akun tidak ditemukan. Silakan daftar terlebih dahulu.']);
    //     }

    //     if (Auth::guard('admin')->attempt(['email' => $request->login, 'password' => $request->password])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/admin/dashboard');
    //     }
    //     // Coba autentikasi dengan email atau nomor telepon
    //     if (Auth::guard('web')->attempt([$loginType => $request->login, 'password' => $request->password])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard');
    //     }

    //     return back()->withErrors(['password' => 'Password salah. Coba lagi.']);
    // }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(RegisterRequest $request)
    {
        Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // // Callback dari Google
    // public function handleGoogleCallback()
    // {
    //     try {
  
    //         $googleUser = Socialite::driver('google')->stateless()->user();
          
    //         // Cek apakah pengguna sudah terdaftar berdasarkan email
    //         $user = Pengguna::where('email', $googleUser->getEmail())->first();

    //         if (!$user) {
    //             // Jika belum ada, buat akun baru
    //             $user = Pengguna::create([
    //                 'name' => $googleUser->getName(),
    //                 'email' => $googleUser->getEmail(),
    //                 'password' => Hash::make(uniqid()), // Buat password acak
    //                 'phone' => NULL,
    //                 'alamat' => '', // Opsional
    //             ]);
    //         }

    //         // Login pengguna
    //         Auth::login($user, true);

    //         return redirect('/dashboard')->with('success', 'Login berhasil!');
    //     } catch (\Exception $e) {
            
    //         // Tangani kesalahan jika ada
    //         return redirect('/login')->withErrors(['google' => 'Gagal login dengan Google. Coba lagi.']);
    //     }
    // }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // // Callback dari Facebook
    // public function handleFacebookCallback()
    // {
    //     try {
    //         $facebookUser = Socialite::driver('facebook')->user();

    //         // Cek apakah user sudah ada di database
    //         $user = Pengguna::where('email', $facebookUser->email)->first();

    //         if (!$user) {
    //             // Jika user belum ada, buat user baru
    //             $user = Pengguna::create([
    //                 'name' => $facebookUser->name,
    //                 'email' => $facebookUser->email,
    //                 'password' => bcrypt('default_password'), // Bisa diganti dengan sesuatu yang lebih aman
    //             ]);
    //         }

    //         // Login user
    //         Auth::login($user);

    //         return redirect('/dashboard'); // Ubah sesuai kebutuhan
    //     } catch (\Exception $e) {
    //         return redirect('/login')->with('error', 'Gagal login dengan Facebook.');
    //     }
    // }
}
