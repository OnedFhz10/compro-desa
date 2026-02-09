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
        'postal_code',
        'district',
        'regency',
        'province',
        'email',
        'phone',
        'history',            // Sejarah
        'vision',             // Visi
        'mission',            // Misi
        'logo_path',
        'structure_image_path', // BAGAN STRUKTUR
        'latitude',           // Peta (Opsional)
        'longitude',          // Peta (Opsional)
        'meta_description',   // SEO
        'meta_keywords',      // SEO
        'population',         // Statistik
        'area_size',          // Statistik (km²)
        'rt_count',           // Statistik
        'rw_count',           // Statistik
        'boundary_north',
        'boundary_south',
        'boundary_east',
        'boundary_west',
        'total_families',
    ];

    /**
     * Format populasi dengan pemisah ribuan
     */
    public function getFormattedPopulationAttribute()
    {
        if (!$this->population) return null;
        return number_format($this->population, 0, ',', '.');
    }

    /**
     * Format luas wilayah dengan 2 desimal
     */
    public function getFormattedAreaAttribute()
    {
        if (!$this->area_size) return null;
        return number_format($this->area_size, 2, ',', '.');
    }

    /**
     * Get alamat lengkap untuk ditampilkan
     */
    public function getFullAddressAttribute()
    {
        $parts = array_filter([
            $this->address,
            $this->district ? "Kec. {$this->district}" : null,
            $this->regency,
            $this->province,
            $this->postal_code,
        ]);

        return implode(', ', $parts);
    }
}