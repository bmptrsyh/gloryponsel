<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customer';

    protected $fillable = ['nama', 'alamat', 'email', 'nomor_telepon', 'password', 'otp', 'otp_expires_at'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
        'otp_expires_at' => 'datetime',
    ];
}
