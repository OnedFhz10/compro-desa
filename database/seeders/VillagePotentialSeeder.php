<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillagePotentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\VillagePotential::firstOrCreate(
            ['slug' => 'wisata-alam-air-terjun'],
            [
                'title' => 'Wisata Alam Air Terjun',
                'category' => 'Pariwisata',
                'description' => 'Air terjun indah dengan ketinggian 50 meter yang terletak di hutan lindung desa. Sangat cocok untuk wisata keluarga dan camping.',
                'image_path' => null, // Biarkan null agar pakai placeholder
                'address' => 'Dusun Rimba Sejuk, RT 01 RW 05',
            ]
        );

        \App\Models\VillagePotential::firstOrCreate(
            ['slug' => 'kerajinan-anyaman-bambu'],
            [
                'title' => 'Kerajinan Anyaman Bambu',
                'category' => 'Ekonomi Kreatif',
                'description' => 'Produk kerajinan tangan berkualitas ekspor buatan ibu-ibu PKK desa. Mulai dari tas, topi, hingga perabot rumah tangga.',
                'image_path' => null,
                'address' => 'Kampung Kreatif, RT 02 RW 03',
            ]
        );

        \App\Models\VillagePotential::firstOrCreate(
            ['slug' => 'pertanian-organik-sayur'],
            [
                'title' => 'Sentra Pertanian Organik',
                'category' => 'Pertanian',
                'description' => 'Kawasan pertanian sayur mayur bebas pestisida yang dikelola kelompok tani muda. Menyediakan wisata petik sayur langsung.',
                'image_path' => null,
                'address' => 'Lahan Tani Makmur, RT 04 RW 01',
            ]
        );
    }
}
