<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    protected $table = 'village_profiles';
    
    // Semua kolom boleh diisi kecuali ID
    protected $guarded = ['id'];
}