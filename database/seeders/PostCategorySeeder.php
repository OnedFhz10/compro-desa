<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Berita Desa', 'slug' => 'berita-desa'],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman'],
            ['name' => 'Agenda Kegiatan', 'slug' => 'agenda-kegiatan'],
        ];

        foreach ($categories as $cat) {
            PostCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}