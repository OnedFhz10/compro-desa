<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    // PENTING: Daftarkan semua nama kolom database di sini
    protected $fillable = [
        'year',
        'type',
        'amount',
        'description',
        'file_path', // Pastikan ini ada jika Anda mengupload file
    ];
}