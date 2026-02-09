<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageOfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kepala Desa
        \App\Models\VillageOfficial::create([
            'name' => 'H. Ahmad Subarjo',
            'position' => 'Kepala Desa',
            'nip' => '19750101 200501 1 001',
            'image_path' => null,
            'order_level' => 1,
            'phone' => '081234567890',
        ]);

        // 2. Sekretaris Desa
        \App\Models\VillageOfficial::create([
            'name' => 'Budi Santoso, S.AP',
            'position' => 'Sekretaris Desa',
            'nip' => '19800505 201001 1 002',
            'image_path' => null,
            'order_level' => 2,
            'phone' => '081234567891',
        ]);

        // 3. Kasi Pemerintahan
        \App\Models\VillageOfficial::create([
            'name' => 'Siti Aminah, S.pd',
            'position' => 'Kasi Pemerintahan',
            'nip' => '19850303 201201 2 003',
            'image_path' => null,
            'order_level' => 3,
            'phone' => '081234567892',
        ]);

        // 4. Kasi Kesejahteraan
        \App\Models\VillageOfficial::create([
            'name' => 'Rudi Hartono',
            'position' => 'Kasi Kesejahteraan',
            'nip' => '19870707 201401 1 004',
            'image_path' => null,
            'order_level' => 3,
            'phone' => '081234567893',
        ]);

        // 5. Kasi Pelayanan
        \App\Models\VillageOfficial::create([
            'name' => 'Dewi Sartika',
            'position' => 'Kasi Pelayanan',
            'nip' => '19900909 201601 2 005',
            'image_path' => null,
            'order_level' => 3,
            'phone' => '081234567894',
        ]);

        // 6. Kaur Tata Usaha & Umum
        \App\Models\VillageOfficial::create([
            'name' => 'Joko Widodo',
            'position' => 'Kaur TU & Umum',
            'nip' => '19921111 201801 1 006',
            'image_path' => null,
            'order_level' => 4,
            'phone' => '081234567895',
        ]);

        // 7. Kaur Keuangan
        \App\Models\VillageOfficial::create([
            'name' => 'Sri Mulyani, SE',
            'position' => 'Kaur Keuangan',
            'nip' => '19950101 202001 2 007',
            'image_path' => null,
            'order_level' => 4,
            'phone' => '081234567896',
        ]);
    }
}
