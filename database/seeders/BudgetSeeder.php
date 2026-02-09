<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = date('Y');

        // 1. PENDAPATAN
        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'income',
            'amount' => 1200000000,
            'description' => 'Dana Desa (DD)',
            'file_path' => null,
        ]);

        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'income',
            'amount' => 450000000,
            'description' => 'Alokasi Dana Desa (ADD)',
            'file_path' => null,
        ]);

        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'income',
            'amount' => 75000000,
            'description' => 'Pendapatan Asli Desa (PADes)',
            'file_path' => null,
        ]);

        // 2. BELANJA
        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'expense',
            'amount' => 500000000,
            'description' => 'Bidang Penyelenggaraan Pemerintahan Desa',
            'file_path' => null,
        ]);

        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'expense',
            'amount' => 800000000,
            'description' => 'Bidang Pelaksanaan Pembangunan Desa',
            'file_path' => null,
        ]);
        
        \App\Models\Budget::create([
            'year' => $year,
            'category' => 'apbdes',
            'type' => 'expense',
            'amount' => 200000000,
            'description' => 'Bidang Pembinaan Kemasyarakatan',
            'file_path' => null,
        ]);
    }
}
