<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    // Relasi ke Kategori
    public function category() {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    // Relasi ke Penulis (User)
    public function user() {
        return $this->belongsTo(User::class);
    }
}