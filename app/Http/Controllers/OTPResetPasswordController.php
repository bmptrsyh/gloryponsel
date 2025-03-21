<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Pengguna;

class OTPResetPasswordController extends Controller
{
    // 1️⃣ Kirim OTP ke Email
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $pengguna = Pengguna::where('email', $request->email)->first();
        if (!$pengguna) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // Buat OTP acak
        $otp = rand(100000, 999999);
        $pengguna->otp = $otp;
        $pengguna->otp_expires_at = now()->addMinutes(10); // Berlaku 10 menit
        $pengguna->save();

        // Kirim email ke pengguna
        Mail::raw("Kode OTP Anda adalah: $otp", function ($message) use ($pengguna) {
            $message->to($pengguna->email)
                    ->subject('Reset Password OTP');
        });

        return redirect()->route('password.otp.verify.form', ['email' => $request->email])
                         ->with('success', 'OTP telah dikirim ke email Anda.');
    }

    // 2️⃣ Verifikasi OTP
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $pengguna = Pengguna::where('email', $request->email)
                            ->where('otp', $request->otp)
                            ->where('otp_expires_at', '>', Carbon::now())
                            ->first();

        if (!$pengguna) {
            return back()->withErrors(['otp' => 'OTP salah atau telah kedaluwarsa']);
        }

        // Hapus OTP setelah diverifikasi
        $pengguna->otp = null;
        $pengguna->otp_expires_at = null;
        $pengguna->save();

        // Redirect ke halaman reset password
        return redirect()->route('password.reset.form', ['email' => $request->email])
                         ->with('success', 'OTP berhasil diverifikasi. Silakan reset password Anda.');
    }

    // 3️⃣ Reset Password setelah OTP Valid
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $pengguna = Pengguna::where('email', $request->email)->first();
        if (!$pengguna) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $pengguna->password = Hash::make($request->password);
        $pengguna->save();

        return redirect()->route('login')->with('status', 'Password berhasil direset. Silakan login.');
    }
}

