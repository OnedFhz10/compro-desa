<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'village_profiles';

    // Izinkan pengisian semua kolom (kecuali ID)
    protected $guarded = ['id'];
}