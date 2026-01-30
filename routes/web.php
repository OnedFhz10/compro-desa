<?php

use Illuminate\Support\Facades\Route;

// 1. Controller Publik & Auth (Tetap di folder utama)
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;

// 2. Controller Admin (Namespace Baru, kita beri alias 'Admin')
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
    
    // Halaman Utama & Statis
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profile')->name('public.profile');
    Route::get('/kontak', 'contact')->name('public.contact');
    Route::get('/pencarian', 'search')->name('public.search');
    
    // Group Pemerintahan
    Route::prefix('pemerintahan')->group(function() {
        Route::get('/struktur', 'structure')->name('public.structure');
        Route::get('/perangkat', 'officials')->name('public.officials');
        Route::get('/rt-rw', 'rtrw')->name('public.rtrw');
        Route::get('/lembaga', 'institutions')->name('public.institutions');
        Route::get('/lembaga/{slug}', 'showInstitution')->name('public.institution.show');
    });

    // Group Informasi
    Route::prefix('informasi')->group(function() {
        Route::get('/berita', 'news')->name('public.news');
        Route::get('/berita/{slug}', 'newsDetail')->name('public.news.show');
        Route::get('/pengumuman', 'announcements')->name('public.announcements');
        Route::get('/agenda', 'agenda')->name('public.agenda');
        Route::get('/galeri', 'gallery')->name('public.gallery');
    });

    // Group Potensi
    Route::prefix('potensi')->group(function() {
        Route::get('/', 'potentials')->name('public.potentials');
        Route::get('/kategori/{slug}', 'potentialsByCategory')->name('public.potentials.category');
    });

    // Group Transparansi
    Route::prefix('transparansi')->group(function() {
        Route::get('/apbdes', 'apbdes')->name('public.transparency.apbdes');
        Route::get('/realisasi', 'realisasi')->name('public.transparency.realisasi');
        Route::get('/laporan', 'laporan')->name('public.transparency.laporan');
    });
}); 


// ==========================================================
// B. ROUTE LAYANAN MANDIRI (Warga)
// ==========================================================

Route::controller(ServiceController::class)->prefix('layanan')->group(function() {
    Route::get('/surat-online', 'indexSurat')->name('public.layanan.surat');
    Route::post('/surat-online', 'storeSurat')->name('public.layanan.surat.store');
    Route::get('/cek-status', 'indexStatus')->name('public.layanan.status');
    Route::get('/pengaduan', 'indexPengaduan')->name('public.layanan.pengaduan');
    Route::post('/pengaduan', 'storePengaduan')->name('public.layanan.pengaduan.store');
    Route::get('/faq', 'indexFaq')->name('public.layanan.faq');
});


// ==========================================================
// C. ROUTE AUTH (Login & Logout)
// ==========================================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// ==========================================================
// D. ROUTE ADMIN PANEL (Hanya User Login)
// ==========================================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Dashboard
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // 2. Profil Desa (Single Record)
    Route::get('/profile', [Admin\VillageProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [Admin\VillageProfileController::class, 'update'])->name('profile.update');
    
    // 3. Update Bagan Struktur (Custom Route di atas Resource)
    Route::put('/officials/structure', [Admin\VillageOfficialController::class, 'updateStructure'])
        ->name('officials.structure');

    // 4. Manajemen Resource (CRUD Otomatis)
    // Route::resource membuat index, create, store, edit, update, destroy sekaligus.
    Route::resource('posts', Admin\PostController::class);
    Route::resource('galleries', Admin\GalleryController::class);
    
    // --> PENAMBAHAN ROUTE AGENDA <--
    Route::resource('agendas', Admin\AgendaController::class);

    Route::resource('officials', Admin\VillageOfficialController::class);
    Route::resource('potentials', Admin\VillagePotentialController::class);
    Route::resource('institutions', Admin\VillageInstitutionController::class);
    Route::resource('neighborhoods', Admin\NeighborhoodController::class);
    Route::resource('budgets', Admin\BudgetController::class);

    // 5. Layanan Surat (Admin hanya memproses, tidak create)
    Route::resource('letters', Admin\LetterRequestController::class)
        ->except(['create', 'store', 'edit']); // Admin tidak perlu form create surat
});