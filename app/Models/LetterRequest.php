<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // Jika login
        'name',          // Nama pemohon
        'nik',
        'phone',
        'letter_type',   // Jenis Surat (SKCK, Domisili, dll)
        'status',        // pending, diproses, selesai, ditolak
        'attachment',    // File pendukung (KTP/KK)
        'admin_note',    // Catatan dari admin
    ];
    
    // Relasi ke User (Opsional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}