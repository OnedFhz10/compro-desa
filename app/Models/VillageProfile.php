<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_name',
        'address',
        'email',
        'phone',
        'history',            // Sejarah
        'vision',             // Visi
        'mission',            // Misi
        'logo_path',
        'structure_image_path', // BAGAN STRUKTUR
        'latitude',           // Peta (Opsional)
        'longitude',          // Peta (Opsional)
    ];
}