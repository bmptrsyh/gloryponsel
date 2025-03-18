<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pengguna;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login' => ['required', 'string', function ($attribute, $value, $fail) {
                // Cek apakah login berupa email atau nomor telepon
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    if (!Pengguna::where('email', $value)->exists()) {
                        $fail('Email ini belum terdaftar.');
                    }
                } elseif (is_numeric($value)) {
                    if (!Pengguna::where('phone', $value)->exists()) {
                        $fail('Nomor telepon ini belum terdaftar.');
                    }
                } else {
                    $fail('Masukkan email atau nomor telepon yang valid.');
                }
            }],
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Email atau nomor telepon harus diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ];
    }
}
