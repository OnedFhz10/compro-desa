<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Faq::create([
            'question' => 'Bagaimana cara mengurus Surat Keterangan Tidak Mampu (SKTM)?',
            'answer' => 'Silakan datang ke Kantor Desa membawa pengantar RT/RW, Fotokopi KK, dan KTP. Petugas kami akan membantu proses pembuatan surat.',
            'is_active' => true,
            'order' => 1,
        ]);

        \App\Models\Faq::create([
            'question' => 'Apa syarat pembuatan KTP Elektronik baru?',
            'answer' => 'Syarat pembuatan KTP-el baru: 1. Telah berusia 17 tahun, 2. Surat Pengantar RT/RW, 3. Fotokopi KK. Perekaman dilakukan di Kecamatan.',
            'is_active' => true,
            'order' => 2,
        ]);

        \App\Models\Faq::create([
            'question' => 'Jam berapa pelayanan Kantor Desa dibuka?',
            'answer' => 'Pelayanan Kantor Desa buka setiap hari Senin - Jumat, Pukul 08.00 - 15.00 WIB. Istirahat pukul 12.00 - 13.00 WIB.',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
