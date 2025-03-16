<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::create([
            'name' => 'Admin Glory Ponsel',
            'username' => 'admin',
            'email' => 'admin@gloryponsel.com',
            'phone' => '08123456789',
            'password' => Hash::make('password123')
        ]);
    }
}
