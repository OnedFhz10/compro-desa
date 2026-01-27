<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VillageProfileController;
use App\Http\Controllers\VillageOfficialController;
use App\Http\Controllers\VillagePotentialController;
use App\Http\Controllers\VillageInstitutionController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\NeighborhoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================================
// 1. ROUTE PUBLIK (Bisa diakses siapa saja)
// ==========================================================

Route::controller(PublicController::class)->group(function () {
    
    // Menu Utama
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
// 2. ROUTE LAYANAN PUBLIK (Dipisah agar lebih rapi)
// ==========================================================

Route::controller(ServiceController::class)->prefix('layanan')->group(function() {
    
    // Surat Online
    Route::get('/surat-online', 'indexSurat')->name('public.layanan.surat');
    Route::post('/surat-online', 'storeSurat')->name('public.layanan.surat.store');

    // Cek Status
    Route::get('/cek-status', 'indexStatus')->name('public.layanan.status');

    // Pengaduan
    Route::get('/pengaduan', 'indexPengaduan')->name('public.layanan.pengaduan');
    Route::post('/pengaduan', 'storePengaduan')->name('public.layanan.pengaduan.store');

    // FAQ
    Route::get('/faq', 'indexFaq')->name('public.layanan.faq');
});


// ==========================================================
// 3. ROUTE TAMU (Login)
// ==========================================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


// ==========================================================
// 4. ROUTE LOGOUT
// ==========================================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// ==========================================================
// 5. ROUTE ADMIN (Hanya user login)
// ==========================================================

Route::middleware('auth')->prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 1. ROUTE KHUSUS UPLOAD STRUKTUR (Tambahkan ini DI ATAS resource officials)
    Route::put('/officials/structure', [VillageOfficialController::class, 'updateStructure'])
        ->name('admin.officials.structure');

    // Profil Desa (Single Record Update)
    Route::get('/profile', [VillageProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [VillageProfileController::class, 'update'])->name('admin.profile.update');

    // Transparansi / APBDes
    Route::resource('/budgets', BudgetController::class)->names('admin.budgets');

    // Resource Controllers (CRUD)
    Route::resource('/posts', PostController::class)->names('admin.posts');
    Route::resource('/galleries', GalleryController::class)->names('admin.galleries');
    Route::resource('/officials', VillageOfficialController::class)->names('admin.officials');
    Route::resource('/potentials', VillagePotentialController::class)->names('admin.potentials');
    Route::resource('/institutions', VillageInstitutionController::class)->names('admin.institutions');
    Route::resource('/neighborhoods', NeighborhoodController::class)->names('admin.neighborhoods');

    // Layanan Surat (Admin hanya memproses, tidak create)
    Route::resource('/letters', LetterRequestController::class)
        ->names('admin.letters')
        ->except(['create', 'store', 'edit']); 
});