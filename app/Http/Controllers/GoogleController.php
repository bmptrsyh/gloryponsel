<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function handleGoogleCallback()
    {
        try {
  
            $googleUser = Socialite::driver('google')->stateless()->user();
          
            // Cek apakah pengguna sudah terdaftar berdasarkan email
            $user = Pengguna::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika belum ada, buat akun baru
                $user = Pengguna::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()), // Buat password acak
                    'phone' => NULL,
                    'alamat' => '', // Opsional
                ]);
            }

            // Login pengguna
            Auth::login($user, true);

            return redirect('/dashboard')->with('success', 'Login berhasil!');
        } catch (\Exception $e) {
            
            // Tangani kesalahan jika ada
            return redirect('/login')->withErrors(['google' => 'Gagal login dengan Google. Coba lagi.']);
        }
    }
}
