<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PostCategorySeeder::class,
            VillageProfileSeeder::class,
            VillageOfficialSeeder::class,   // [NEW]
            VillageInstitutionSeeder::class,// [NEW]
            NeighborhoodSeeder::class,      // [NEW]
            PostSeeder::class,              // [NEW]
            GallerySeeder::class,           // [NEW]
            AgendaSeeder::class,            // [NEW]
            BudgetSeeder::class,            // [NEW]
            FaqSeeder::class,               // [NEW]
            VillagePotentialSeeder::class,
        ]);
    }
}
