<?php

use Illuminate\Support\Facades\Route;

// 1. Controller Publik
use App\Http\Controllers\PublicController;      // Home, Profile, Contact
use App\Http\Controllers\InformationController; // News, Agenda, Gallery
use App\Http\Controllers\GovernmentController;  // Structure, Officials, Institutions
use App\Http\Controllers\PotentialController;   // Potentials
use App\Http\Controllers\TransparencyController;// Budget/Reports
use App\Http\Controllers\StatisticController;   // Statistics

// 2. Controller Admin & Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin as Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Struktur routing telah dirapikan untuk memisahkan tanggung jawab
| antar controller dan memudahkan maintenance.
|
*/

// ==========================================================
// A. ROUTE PUBLIK (Bisa diakses siapa saja)
// ==========================================================

// 1. UTAMA (Landing Page)
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profile')->name('public.profile');
    Route::get('/kontak', 'contact')->name('public.contact');
});

// 2. INFORMASI PUBLIK
Route::controller(InformationController::class)->group(function() {
    Route::get('/berita', 'news')->name('public.news.index');
    Route::get('/berita/{slug}', 'newsDetail')->name('public.news.show');
    Route::get('/pengumuman', 'announcements')->name('public.announcements.index');
    Route::get('/agenda', 'agenda')->name('public.agenda.index');
    Route::get('/galeri', 'gallery')->name('public.gallery.index');
    Route::get('/cari', 'search')->name('public.search');
});

// 3. PEMERINTAHAN
Route::controller(GovernmentController::class)->prefix('pemerintahan')->group(function() {
    Route::get('/struktur', 'structure')->name('public.government.structure');
    Route::get('/perangkat', 'officials')->name('public.government.officials');
    Route::get('/lembaga', 'institutions')->name('public.government.institutions');
    Route::get('/lembaga/{institution:slug}', 'showInstitution')->name('public.government.institutions.show');
    Route::get('/rt-rw', 'rtrw')->name('public.government.rtrw');
});

// 4. POTENSI DESA
Route::controller(PotentialController::class)->prefix('potensi')->group(function() {
    Route::get('/', 'index')->name('public.potentials.index');
    Route::get('/kategori/{category}', 'category')->name('public.potentials.category');
    Route::get('/{slug}', 'show')->name('public.potentials.show');
});

// 5. TRANSPARANSI (APBDes)
Route::controller(TransparencyController::class)->prefix('transparansi')->group(function() {
    Route::get('/apbdes', 'apbdes')->name('public.transparency.apbdes');
    Route::get('/realisasi', 'realisasi')->name('public.transparency.realisasi');
    Route::get('/laporan', 'laporan')->name('public.transparency.reports');
});

// 6. STATISTIK DESA
Route::get('/statistik', [StatisticController::class, 'index'])->name('public.statistics.index');


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
// C. ROUTE ADMIN PANEL (Protected)
// ==========================================================

Route::middleware(['auth', 'role:Super Admin,Admin Konten'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Dashboard
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // 2. Profil Desa (Single Record)
    Route::get('/profile', [Admin\VillageProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [Admin\VillageProfileController::class, 'update'])->name('profile.update');
    
    // 3. Update Bagan Struktur
    Route::put('/officials/structure', [Admin\VillageOfficialController::class, 'updateStructure'])
        ->name('officials.structure');

    // 4. Manajemen Resource (CRUD)
    Route::resources([
        'posts'         => Admin\PostController::class,
        'galleries'     => Admin\GalleryController::class,
        'agendas'       => Admin\AgendaController::class,
        'officials'     => Admin\VillageOfficialController::class,
        'potentials'    => Admin\VillagePotentialController::class,
        'institutions'  => Admin\VillageInstitutionController::class,
        'neighborhoods' => Admin\NeighborhoodController::class,
        'budgets'       => Admin\BudgetController::class,
        'users'         => Admin\UserController::class,
    ]);

    // 5. Data Statistik
    Route::get('/statistics', [Admin\VillageStatisticController::class, 'index'])->name('statistics.index');
    Route::put('/statistics/general', [Admin\VillageStatisticController::class, 'updateGeneral'])->name('statistics.updateGeneral');
    Route::put('/statistics', [Admin\VillageStatisticController::class, 'update'])->name('statistics.update');

 
});