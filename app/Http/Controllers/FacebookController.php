<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Callback dari Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Cek apakah user sudah ada di database
            $user = Pengguna::where('email', $facebookUser->email)->first();

            if (!$user) {
                // Jika user belum ada, buat user baru
                $user = Pengguna::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => bcrypt('default_password'), // Bisa diganti dengan sesuatu yang lebih aman
                ]);
            }

            // Login user
            Auth::login($user);

            return redirect('/dashboard'); // Ubah sesuai kebutuhan
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Facebook.');
        }
    }
}
