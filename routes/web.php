<?php

use Illuminate\Support\Facades\Route;

// 1. Controller Publik & Auth
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\ServiceController; // Kita pakai PublicController saja agar simpel

// 2. Controller Admin
use App\Http\Controllers\Admin as Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================================
// A. ROUTE PUBLIK (Bisa diakses siapa saja)
// ==========================================================

Route::controller(PublicController::class)->group(function () {
    
    // 1. Halaman Utama & Statis
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profile')->name('public.profile');
    Route::get('/kontak', 'contact')->name('public.contact');
    Route::get('/pencarian', 'search')->name('public.search');
    
    // 2. Group Pemerintahan
    Route::prefix('pemerintahan')->group(function() {
        Route::get('/struktur', 'structure')->name('public.structure');
        Route::get('/perangkat', 'officials')->name('public.officials');
        Route::get('/rt-rw', 'rtrw')->name('public.rtrw');
        Route::get('/lembaga', 'institutions')->name('public.institutions');
        // Perbaikan: sesuaikan nama method di controller ('showInstitution')
        Route::get('/lembaga/{slug}', 'showInstitution')->name('public.institution.show');
    });

    // 3. Group Informasi
    Route::prefix('informasi')->group(function() {
        Route::get('/berita', 'news')->name('public.news');
        // Perbaikan: sesuaikan nama method ('newsDetail')
        Route::get('/berita/{slug}', 'newsDetail')->name('public.news.show'); 
        Route::get('/pengumuman', 'announcements')->name('public.announcements');
        Route::get('/agenda', 'agenda')->name('public.agenda'); 
        Route::get('/galeri', 'gallery')->name('public.gallery');
    });

    // 4. Group Potensi
    Route::prefix('potensi')->group(function() {
        // Halaman Utama Potensi
        // CUKUP TULIS NAMA METHOD STRINGNYA SAJA KARENA SUDAH DI DALAM Route::controller
        Route::get('/', 'potential')->name('public.potentials');
        
        // Filter Kategori
        Route::get('/kategori/{category}', 'potentialByCategory')->name('public.potentials.category');
        
        // Detail Potensi
        Route::get('/{slug}', 'showPotential')->name('public.potentials.show');
    });

    // 5. Group Transparansi
    Route::prefix('transparansi')->group(function() {
        Route::get('/apbdes', 'apbdes')->name('public.transparency.apbdes');
        // Perbaikan: sesuaikan nama method ('realisasi' & 'laporan')
        Route::get('/realisasi', 'realisasi')->name('public.transparency.realisasi'); 
        Route::get('/laporan', 'laporan')->name('public.transparency.laporan'); 
    });

    // 6. Group Layanan Mandiri (Disatukan di PublicController sesuai kode sebelumnya)
    Route::prefix('layanan')->group(function() {
        Route::get('/surat-online', 'layananSurat')->name('public.layanan.surat');
        // Route::post('/surat-online', 'storeSurat')->name('public.layanan.surat.store'); // Buka jika sudah ada method store
        
        Route::get('/cek-status', 'layananStatus')->name('public.layanan.status');
        
        Route::get('/pengaduan', 'layananPengaduan')->name('public.layanan.pengaduan');
        // Route::post('/pengaduan', 'storePengaduan')->name('public.layanan.pengaduan.store'); // Buka jika sudah ada method store
    });

}); 


// ==========================================================
// B. ROUTE AUTH (Login & Logout)
// ==========================================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// ==========================================================
// C. ROUTE ADMIN PANEL (Hanya User Login)
// ==========================================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Dashboard
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // 2. Profil Desa
    Route::get('/profile', [Admin\VillageProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [Admin\VillageProfileController::class, 'update'])->name('profile.update');
    
    // 3. Update Bagan Struktur
    Route::put('/officials/structure', [Admin\VillageOfficialController::class, 'updateStructure'])
        ->name('officials.structure');

    // 4. Manajemen Resource (CRUD Otomatis)
    Route::resource('posts', Admin\PostController::class);
    Route::resource('galleries', Admin\GalleryController::class);
    Route::resource('agendas', Admin\AgendaController::class);
    Route::resource('officials', Admin\VillageOfficialController::class);
    
    // INI ROUTE ADMIN POTENSI (Pastikan Controller Admin diimport/ada)
    Route::resource('potentials', Admin\VillagePotentialController::class);
    
    Route::resource('institutions', Admin\VillageInstitutionController::class);
    Route::resource('neighborhoods', Admin\NeighborhoodController::class);
    Route::resource('budgets', Admin\BudgetController::class);

    // 5. Layanan Surat (Admin View)
    // Pastikan Controller LetterRequestController ada, jika belum bisa dikomentari dulu
    Route::resource('letters', Admin\LetterRequestController::class)->except(['create', 'store', 'edit']); 
});