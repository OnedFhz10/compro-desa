<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita',
                'slug' => 'berita',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            $exists = DB::table('post_categories')
                ->where('slug', $category['slug'])
                ->exists();
            
            if (!$exists) {
                DB::table('post_categories')->insert($category);
            }
        }
    }
}