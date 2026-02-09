<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Gallery::create([
            'title' => 'Kegiatan Gotong Royong Jumat Bersih',
            'description' => 'Warga desa antusias membersihkan lingkungan sekitar balai desa.',
            'image_path' => null,
        ]);

        \App\Models\Gallery::create([
            'title' => 'Musrenbang Desa Tahun 2026',
            'description' => 'Musyawarah Perencanaan Pembangunan Desa dihadiri oleh seluruh elemen masyarakat.',
            'image_path' => null,
        ]);

        \App\Models\Gallery::create([
            'title' => 'Panen Raya Padi Organik',
            'description' => 'Hasil panen padi organik kelompok tani desa meningkat signifikan tahun ini.',
            'image_path' => null,
        ]);

        \App\Models\Gallery::create([
            'title' => 'Pelatihan Digital Marketing UMKM',
            'description' => 'Pelatihan pemasaran produk UMKM secara online untuk ibu-ibu PKK.',
            'image_path' => null,
        ]);
    }
}
