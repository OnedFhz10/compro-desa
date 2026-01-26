<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Tambahkan ini
use App\Models\VillageProfile;       // Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Bagikan data profil ke SEMUA view
        // Menggunakan try-catch agar tidak error saat baru migrate (tabel belum ada)
        try {
            $globalProfile = VillageProfile::first() ?? new VillageProfile();
            View::share('globalProfile', $globalProfile);
        } catch (\Exception $e) {
            // Do nothing jika database belum siap
        }
    }
}