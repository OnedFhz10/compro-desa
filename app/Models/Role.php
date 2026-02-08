<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Kita memproteksi kolom ID agar tidak bisa diubah sembarangan.
     * Kolom lain (seperti 'name') boleh diisi massal.
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relasi: Satu Role bisa dimiliki oleh banyak User.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}