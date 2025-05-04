<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Agar bisa digunakan untuk login
use Illuminate\Notifications\Notifiable;

class UserPos extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_pos';

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'role',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
