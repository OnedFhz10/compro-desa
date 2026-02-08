<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageInstitution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation', // Singkatan, misal: LPM
        'description',
        'image_path',
        'slug',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($institution) {
            if (empty($institution->slug)) {
                $institution->slug = static::generateUniqueSlug($institution->name);
            }
        });

        static::updating(function ($institution) {
            // Update slug hanya jika nama berubah
            if ($institution->isDirty('name')) {
                $institution->slug = static::generateUniqueSlug($institution->name, $institution->id);
            }
        });
    }

    /**
     * Generate unique slug dari nama
     */
    protected static function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = \Illuminate\Support\Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah ada, jika ada tambahkan angka
        while (static::where('slug', $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                return $query->where('id', '!=', $ignoreId);
            })
            ->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}