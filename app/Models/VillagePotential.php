<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePotential extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',    // <--- PENTING untuk filter
        'description',
        'image_path',
        'address',     // <--- PENTING untuk lokasi
    ];
}