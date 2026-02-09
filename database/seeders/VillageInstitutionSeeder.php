<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. BPD
        \App\Models\VillageInstitution::firstOrCreate(
            ['abbreviation' => 'BPD'],
            [
                'name' => 'Badan Permusyawaratan Desa',
                'description' => 'Lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil dari penduduk Desa berdasarkan keterwakilan wilayah dan ditetapkan secara demokratis.',
                'image_path' => null,
            ]
        );

        // 2. LPMD
        \App\Models\VillageInstitution::firstOrCreate(
            ['abbreviation' => 'LPMD'],
            [
                'name' => 'Lembaga Pemberdayaan Masyarakat Desa',
                'description' => 'Lembaga atau wadah yang dibentuk atas prakarsa masyarakat sebagai mitra Pemerintah Desa dalam menampung dan mewujudkan aspirasi serta kebutuhan masyarakat di bidang pembangunan.',
                'image_path' => null,
            ]
        );

        // 3. PKK
        \App\Models\VillageInstitution::firstOrCreate(
            ['abbreviation' => 'PKK'],
            [
                'name' => 'Pemberdayaan Kesejahteraan Keluarga',
                'description' => 'Gerakan nasional dalam pembangunan masyarakat yang tumbuh dari bawah yang pengelolaannya dari, oleh dan untuk masyarakat menuju terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa.',
                'image_path' => null,
            ]
        );

        // 4. Karang Taruna
        \App\Models\VillageInstitution::firstOrCreate(
            ['abbreviation' => 'Karang Taruna'],
            [
                'name' => 'Karang Taruna Tunas Harapan',
                'description' => 'Wadah pengembangan generasi muda non-partisan, yang tumbuh atas dasar kesadaran dan rasa tanggung jawab sosial dari, oleh dan untuk masyarakat khususnya generasi muda di wilayah Desa.',
                'image_path' => null,
            ]
        );

        // 5. Linmas
        \App\Models\VillageInstitution::firstOrCreate(
            ['abbreviation' => 'LINMAS'],
            [
                'name' => 'Perlindungan Masyarakat',
                'description' => 'Warga masyarakat yang disiapkan dan dibekali pengetahuan serta keterampilan untuk melaksanakan kegiatan penanganan bencana guna mengurangi dan memperkecil akibat bencana, serta ikut memelihara keamanan, ketentraman dan ketertiban masyarakat, kegiatan sosial kemasyarakatan.',
                'image_path' => null,
            ]
        );
    }
}
