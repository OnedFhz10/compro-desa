<?php

namespace Database\Seeders;

use App\Models\VillageStatistic;
use Illuminate\Database\Seeder;

class VillageStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Update Data Profil Desa (Luas, Batas, KK, Penduduk Total)
        $profile = \App\Models\VillageProfile::first();
        if ($profile) {
            $profile->update([
                'area_size' => 15.5, // km2
                'population' => 2550,
                'total_families' => 850,
                'boundary_north' => 'Desa Sukamaju',
                'boundary_south' => 'Sungai Citarum',
                'boundary_east'  => 'Kecamatan Bojong',
                'boundary_west'  => 'Hutan Lindung',
            ]);
        }

        // 1. Data Penduduk berdasarkan Gender
        VillageStatistic::updateOrCreate(
            ['category' => 'penduduk', 'name' => 'Laki-laki'],
            ['value' => 1250, 'year' => 2024]
        );
        VillageStatistic::updateOrCreate(
            ['category' => 'penduduk', 'name' => 'Perempuan'],
            ['value' => 1300, 'year' => 2024]
        );

        // 2. Data Pendidikan
        $pendidikan = [
            'Belum Sekolah' => 150,
            'TK/PAUD' => 100,
            'SD/Sederajat' => 450,
            'SMP/Sederajat' => 350,
            'SMA/Sederajat' => 800,
            'Diploma/Sarjana' => 400,
            'Putus Sekolah' => 50,
        ];
        foreach ($pendidikan as $key => $val) {
            VillageStatistic::updateOrCreate(
                ['category' => 'pendidikan', 'name' => $key],
                ['value' => $val, 'year' => 2024]
            );
        }

        // 3. Data Pekerjaan
        $pekerjaan = [
            'Petani' => 500,
            'Pedagang' => 200,
            'PNS/TNI/Polri' => 150,
            'Wiraswasta' => 300,
            'Ibu Rumah Tangga' => 400,
            'Belum/Tidak Bekerja' => 250,
            'Pelajar/Mahasiswa' => 550,
        ];
        foreach ($pekerjaan as $key => $val) {
            VillageStatistic::updateOrCreate(
                ['category' => 'pekerjaan', 'name' => $key],
                ['value' => $val, 'year' => 2024]
            );
        }

        // 4. Data Agama
        $agama = [
            'Islam' => 2400,
            'Kristen' => 100,
            'Katolik' => 30,
            'Hindu' => 10,
            'Buddha' => 10,
            'Konghucu' => 0,
        ];
        foreach ($agama as $key => $val) {
             VillageStatistic::updateOrCreate(
                ['category' => 'agama', 'name' => $key],
                ['value' => $val, 'year' => 2024]
            );
        }
    }
}
