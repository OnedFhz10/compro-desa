<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'nip',          // Jika ada
        'image_path',
        'order_level',  // Untuk urutan tampilan
        'phone',
    ];
}