<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user dan kategori
        $user = \App\Models\User::first();
        if (!$user) return;

        $catBerita = \App\Models\PostCategory::firstOrCreate(['slug' => 'berita'], ['name' => 'Berita Desa']);
        $catPengumuman = \App\Models\PostCategory::firstOrCreate(['slug' => 'pengumuman'], ['name' => 'Pengumuman']);
        $catArtikel = \App\Models\PostCategory::firstOrCreate(['slug' => 'artikel'], ['name' => 'Artikel']);

        // 1. Berita
        \App\Models\Post::create([
            'title' => 'Penyaluran Bantuan Langsung Tunai (BLT) Tahap I Tahun 2026',
            'slug' => 'penyaluran-blt-tahap-1-2026',
            'category_id' => $catBerita->id,
            'content' => 'Pemerintah Desa telah menyalurkan Bantuan Langsung Tunai (BLT) tahap pertama tahun 2026 kepada 100 Keluarga Penerima Manfaat (KPM). Penyaluran berjalan tertib dan lancar di Balai Desa.',
            'excerpt' => 'Penyaluran BLT Tahap I tahun 2026 berjalan lancar. Sebanyak 100 KPM telah menerima bantuan.',
            'image_path' => null,
            'user_id' => $user->id,
            'is_published' => true,
            'is_featured' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'Kerja Bakti Massal Membersihkan Saluran Irigasi',
            'slug' => 'kerja-bakti-irigasi',
            'category_id' => $catBerita->id,
            'content' => 'Warga Desa bergotong royong membersihkan saluran irigasi untuk menyambut musim tanam. Kegiatan ini diikuti oleh seluruh elemen masyarakat dan perangkat desa.',
            'excerpt' => 'Warga antusias mengikuti kerja bakti massal pembersihan saluran irigasi jelang musim tanam.',
            'image_path' => null,
            'user_id' => $user->id,
            'is_published' => true,
            'is_featured' => false,
        ]);

        // 2. Pengumuman
        \App\Models\Post::create([
            'title' => 'Jadwal Pelayanan Posyandu Bulan Februari',
            'slug' => 'jadwal-posyandu-februari',
            'category_id' => $catPengumuman->id,
            'content' => 'Diberitahukan kepada seluruh warga bahwa pelayanan Posyandu Balita dan Lansia akan dilaksanakan pada hari Rabu, 15 Februari 2026 di Polindes.',
            'excerpt' => 'Pelayanan Posyandu akan dilaksanakan Rabu, 15 Februari 2026. Harap membawa buku KIA.',
            'image_path' => null,
            'user_id' => $user->id,
            'is_published' => true,
            'is_featured' => false,
        ]);

        // 3. Artikel
        \App\Models\Post::create([
            'title' => 'Potensi Wisata Alam Desa yang Menjanjikan',
            'slug' => 'potensi-wisata-alam',
            'category_id' => $catArtikel->id,
            'content' => 'Desa kita memiliki potensi wisata alam yang luar biasa, mulai dari air terjun hingga hamparan sawah yang indah. Mari kita jaga bersama.',
            'excerpt' => 'Air terjun dan persawahan menjadi aset wisata desa yang perlu dikembangkan.',
            'image_path' => null,
            'user_id' => $user->id,
            'is_published' => true,
            'is_featured' => true,
        ]);
    }
}
