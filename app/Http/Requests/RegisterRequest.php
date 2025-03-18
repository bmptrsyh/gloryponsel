<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan return true agar request ini dapat digunakan
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|unique:pengguna,phone',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap harus diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok, silakan coba lagi.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'address.required' => 'Alamat lengkap harus diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.numeric' => 'Nomor telepon harus berupa angka.',
            'phone.unique' => 'Nomor telepon sudah terdaftar.',
        ];
    }
}
