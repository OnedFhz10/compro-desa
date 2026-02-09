<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dusuns = ['Dusun Krajan', 'Dusun Timur', 'Dusun Barat', 'Dusun Selatan'];

        foreach ($dusuns as $dusunName) {
            // Setiap Dusun punya 2 RW
            for ($i = 1; $i <= 2; $i++) {
                $rw = '0' . $i;
                // Setiap RW punya 3 RT
                for ($j = 1; $j <= 3; $j++) {
                    \App\Models\Neighborhood::create([
                        'dusun' => $dusunName,
                        'rw' => $rw,
                        'rt' => '0' . $j,
                        'head_name' => 'Bapak Ketua RT ' . $j,
                        'phone' => '0812345678' . $i . $j,
                    ]);
                }
            }
        }
    }
}
