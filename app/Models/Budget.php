<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'category',    // apbdes, realisasi, laporan
        'type',        // income (pendapatan), expense (belanja)
        'amount',
        'description',
        'file_path'
    ];

    // Format angka ke format Rupiah otomatis
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    // Label untuk Type (Income/Expense)
    public function getTypeLabelAttribute()
    {
        return $this->type === 'income' ? 'Pendapatan' : 'Belanja';
    }
    
    // Label untuk Category
    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'apbdes' => 'APBDes',
            'realisasi' => 'Realisasi Anggaran',
            'laporan' => 'Laporan Keuangan',
            default => ucfirst($this->category),
        };
    }
}