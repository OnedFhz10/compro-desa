<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile; // ✅ Import Model di sini

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan updateOrCreate agar jika seeder dijalankan 2x, data tidak dobel
        VillageProfile::updateOrCreate(
            ['id' => 1], // Cek apakah ID 1 sudah ada?
            [
                'village_name' => 'Desa Digital',
                'address'      => 'Jl. Merdeka No. 1, Indonesia',
                'email'        => 'info@desa.id',
                'phone'        => '08123456789',
                'history'      => 'Desa ini didirikan pada tahun...',
                'vision'       => 'Menjadi desa mandiri digital.',
                'mission'      => 'Meningkatkan pelayanan publik.',
            ]
        );
    }
}