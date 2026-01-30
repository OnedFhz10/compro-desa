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
        'event_date', // Kolom untuk tanggal & jam acara
        'location',   // Kolom lokasi
    ];

    // Opsional: Casting agar event_date otomatis jadi objek Carbon (mudah diformat tgl/jam)
    protected $casts = [
        'event_date' => 'datetime',
    ];
}