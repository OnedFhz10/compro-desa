<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita',
                'slug' => 'berita',
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
            ],
            [
                'name' => 'Agenda',
                'slug' => 'agenda',
            ],
            [
                'name' => 'Layanan',
                'slug' => 'layanan',
            ],
        ];

        foreach ($categories as $cat) {
            // firstOrCreate: Cek apakah data sudah ada berdasarkan slug, jika belum buat baru
            PostCategory::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}