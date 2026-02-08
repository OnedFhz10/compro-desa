<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_code', // Sesuai migration
        'name',
        'nik',
        'phone',
        'letter_type',
        'keperluan',     // Sesuai migration
        'status',
        'attachment',
        'admin_note',
    ];
    
    // Relasi ke User (Opsional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}