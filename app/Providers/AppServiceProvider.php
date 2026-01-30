<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import Facade View
use Illuminate\Pagination\Paginator; // Import Paginator
use App\Models\VillageProfile;       // Import Model Profil

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Pagination agar menggunakan style Bootstrap (bukan Tailwind default)
        Paginator::useBootstrap();

        // 2. View Composer: Kirim variable $profile ke SEMUA halaman di folder 'public'
        // Jadi kamu tidak perlu memanggil VillageProfile::first() lagi di Controller.
        View::composer('public.*', function ($view) {
            $view->with('profile', VillageProfile::first());
        });
    }
}