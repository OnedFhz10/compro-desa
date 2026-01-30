<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePotential extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',    // Wisata, Produk, dll
        'description',
        'image',
        'price',       // Opsional
        'location',    // Opsional
    ];
}