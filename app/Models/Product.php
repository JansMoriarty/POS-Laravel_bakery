<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'name', 
        'kategori', 
        'price', 
        'stock', 
        'unit', 
        'gambar'
    ];

    // Jika menggunakan tipe enum untuk kategori, bisa ditambahkan seperti ini untuk memastikan validitas input
    protected $casts = [
        'kategori' => 'string', // Bisa tambahkan casting ke tipe yang lebih sesuai jika perlu
    ];

    // Tambahan pengaturan jika diperlukan (misalnya relasi atau custom methods)
}
