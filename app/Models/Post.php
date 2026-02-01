<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'category_id', 
        'content', 
        'image_path', 
        'excerpt',
        'user_id',
        'is_published'
    ];

    // Tambahkan Casts agar is_published jadi boolean
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- PERBAIKAN UTAMA: ACCESSOR ---
    // Ini membuat panggilan $post->image di view public (show.blade.php)
    // otomatis mengambil nilai dari kolom 'image_path' database.
    public function getImageAttribute()
    {
        return $this->image_path;
    }
}