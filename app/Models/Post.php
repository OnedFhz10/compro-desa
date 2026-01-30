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
        'image_path',   // <--- PASTIKAN INI image_path
        'excerpt',      // Tambahan dari migration
        'user_id',
        'is_published'
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}