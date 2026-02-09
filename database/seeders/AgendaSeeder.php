<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Rapat
        \App\Models\Agenda::create([
            'title' => 'Rapat Koordinasi Perangkat Desa',
            'slug' => 'rapat-koordinasi-perangkat-desa',
            'description' => 'Evaluasi kinerja bulanan dan pembahasan rencana kerja bulan depan.',
            'date' => now()->addDays(2),
            'time' => '09:00:00',
            'location' => 'Aula Kantor Desa',
            'is_active' => true,
        ]);

        // 2. Posyandu
        \App\Models\Agenda::create([
            'title' => 'Posyandu Balita Nusa Indah',
            'slug' => 'posyandu-balita-nusa-indah',
            'description' => 'Pemeriksaan kesehatan rutin balita, pemberian vitamin A, dan penyuluhan gizi.',
            'date' => now()->addDays(5),
            'time' => '08:00:00',
            'location' => 'Polindes',
            'is_active' => true,
        ]);

        // 3. Penyaluran BLT
        \App\Models\Agenda::create([
            'title' => 'Penyaluran BLT Tahap II',
            'slug' => 'penyaluran-blt-tahap-ii',
            'description' => 'Penyaluran Bantuan Langsung Tunai Dana Desa Tahap II kepada KPM.',
            'date' => now()->addDays(10),
            'time' => '13:00:00',
            'location' => 'Balai Desa',
            'is_active' => true,
        ]);

        // 4. Kerja Bakti
        \App\Models\Agenda::create([
            'title' => 'Kerja Bakti Lingkungan',
            'slug' => 'kerja-bakti-lingkungan',
            'description' => 'Membersihkan selokan dan pemangkasan rumput di sepanjang jalan utama desa.',
            'date' => now()->addDays(7),
            'time' => '07:00:00',
            'location' => 'Lingkungan RT 01 - RT 05',
            'is_active' => true,
        ]);
    }
}
