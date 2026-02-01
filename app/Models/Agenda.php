<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'time',
        'location',
        'is_active'
    ];

    // Casting date agar bisa diformat di view
    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}