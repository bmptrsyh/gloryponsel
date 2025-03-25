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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:customer,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|numeric|unique:customer,nomor_telepon',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama lengkap harus diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok, silakan coba lagi.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'alamat.required' => 'Alamat lengkap harus diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'nomor_telepon.unique' => 'Nomor telepon sudah terdaftar.',
        ];
    }
}
