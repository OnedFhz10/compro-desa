<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillageProfile;
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;
use App\Models\Gallery;
use App\Models\VillageInstitution;
use App\Models\Neighborhood;
use App\Models\Agenda;
use App\Models\Budget;

class PublicController extends Controller
{
    // 1. Halaman Beranda (Home)
   public function index()
{
    $profile = VillageProfile::first();
    
    // Ambil data Kepala Desa (Cari yang jabatannya mengandung kata 'Kepala Desa')
    $kades = \App\Models\VillageOfficial::where('position', 'like', '%Kepala Desa%')->first();

    $latestPosts = Post::with('category')->latest()->take(3)->get(); 
    $potentials = VillagePotential::inRandomOrder()->take(3)->get(); 

    // Jangan lupa tambahkan 'kades' ke compact
    return view('public.home', compact('profile', 'latestPosts', 'potentials', 'kades'));
}

    // 2. Halaman Profil Desa
    public function profile()
{
    $profile = VillageProfile::first();
    // Tambahkan baris ini untuk mengambil 3 potensi secara acak
    $potentials = \App\Models\VillagePotential::inRandomOrder()->take(3)->get();
    
    return view('public.profile', compact('profile', 'potentials'));
}

    // 3. Halaman Daftar Berita
    public function news()
{
    // Asumsi: Kategori 'Pengumuman' tidak ditampilkan disini
    $posts = Post::whereHas('category', function($q){
        $q->where('name', '!=', 'Pengumuman');
    })->latest()->paginate(9);
    
    return view('public.informasi.berita', compact('posts'));
}

// 2. HALAMAN PENGUMUMAN (Khusus Kategori Pengumuman)
public function announcements()
{
    $posts = Post::whereHas('category', function($q){
        $q->where('name', 'Pengumuman');
    })->latest()->paginate(10);

    return view('public.informasi.pengumuman', compact('posts'));
}

// 3. HALAMAN AGENDA (Model Baru)
public function agenda()
{
    // Urutkan berdasarkan tanggal acara terdekat
    $agendas = Agenda::where('event_date', '>=', now())
                ->orderBy('event_date', 'asc')
                ->paginate(9);
                
    return view('public.informasi.agenda', compact('agendas'));
}

// 4. GALERI (Sudah ada, tinggal pastikan view-nya benar)
public function gallery()
{
    $galleries = Gallery::latest()->paginate(12);
    return view('public.informasi.galeri', compact('galleries'));
}

    // 4. Halaman Detail Berita
    public function newsDetail($slug)
{
    $post = Post::with('category', 'user')->where('slug', $slug)->firstOrFail();
    
    // Ambil berita terbaru lain untuk sidebar (kecuali berita yang sedang dibuka)
    $recentPosts = Post::where('id', '!=', $post->id)
                   ->with('category')
                   ->latest()
                   ->take(5)
                   ->get();

    // UPDATE DI SINI: Arahkan ke folder 'public.informasi.show'
    return view('public.informasi.show', compact('post', 'recentPosts'));
}

    // 1. SEMUA POTENSI (Halaman Utama)
public function potentials()
{
    $potentials = \App\Models\VillagePotential::latest()->paginate(9);
    $pageTitle = 'Semua Potensi Desa';
    $pageDescription = 'Jelajahi seluruh kekayaan alam, produk, dan usaha lokal desa kami.';
    
    return view('public.potensi.index', compact('potentials', 'pageTitle', 'pageDescription'));
}

// 2. POTENSI PER KATEGORI (Wisata, UMKM, Produk)
public function potentialsByCategory($slug)
{
    // Mapping Slug URL ke Nama Kategori di Database
    // Pastikan input di Admin Panel ("Wisata", "UMKM", "Produk") sesuai huruf besar/kecilnya
    $categories = [
        'wisata' => 'Wisata',
        'umkm'   => 'UMKM',
        'produk' => 'Produk'
    ];

    $categoryName = $categories[$slug] ?? abort(404); // Jika kategori ngawur, error 404

    $potentials = \App\Models\VillagePotential::where('category', $categoryName)
                    ->latest()
                    ->paginate(9);

    // Judul Halaman Dinamis
    $titles = [
        'wisata' => 'Destinasi Wisata',
        'umkm'   => 'UMKM Desa',
        'produk' => 'Produk Unggulan'
    ];
    
    $descriptions = [
        'wisata' => 'Temukan keindahan alam dan spot menarik untuk berlibur.',
        'umkm'   => 'Dukung ekonomi lokal dengan mengenal usaha mikro kecil menengah warga.',
        'produk' => 'Berbagai hasil bumi dan kerajinan tangan asli buatan desa.'
    ];

    $pageTitle = $titles[$slug];
    $pageDescription = $descriptions[$slug];

    return view('public.potensi.index', compact('potentials', 'pageTitle', 'pageDescription', 'slug'));
}


// 1. STRUKTUR ORGANISASI
    public function structure()
    {
        $profile = \App\Models\VillageProfile::first();
        // Arahkan ke file struktur.blade.php
        return view('public.pemerintahan.struktur', compact('profile'));
    }

    // 2. PERANGKAT DESA
    public function officials()
    {
        $profile = \App\Models\VillageProfile::first();
        $officials = \App\Models\VillageOfficial::orderBy('id', 'asc')->get();
        // Arahkan ke file perangkat.blade.php
        return view('public.pemerintahan.perangkat', compact('profile', 'officials'));
    }

    // 3. LEMBAGA DESA (List)
    public function institutions()
    {
        $profile = \App\Models\VillageProfile::first();
        $institutions = \App\Models\VillageInstitution::all();
        // Arahkan ke file lembaga.blade.php
        return view('public.pemerintahan.lembaga', compact('profile', 'institutions'));
    }

    // 4. LEMBAGA DESA (Detail)
    public function showInstitution($slug)
    {
        $profile = \App\Models\VillageProfile::first();
        $institution = \App\Models\VillageInstitution::where('name', 'like', '%' . $slug . '%')->first();
        $pageTitle = strtoupper(str_replace('-', ' ', $slug));
        
        // Arahkan ke file lembaga_show.blade.php
        return view('public.pemerintahan.lembaga_show', compact('profile', 'institution', 'pageTitle'));
    }

    // 5. RT / RW
    public function rtrw()
    {
        $profile = \App\Models\VillageProfile::first();
        $neighborhoods = \App\Models\Neighborhood::orderBy('dusun')->orderBy('rw')->orderBy('rt')->get()
                        ->groupBy(['dusun', 'rw']);
        // Arahkan ke file rt_rw.blade.php
        return view('public.pemerintahan.rt_rw', compact('profile', 'neighborhoods'));
    }


// 1. APBDes
public function apbdes()
{
    // Ambil data kategori apbdes, urutkan tahun terbaru
    $data = Budget::where('category', 'apbdes')->orderBy('year', 'desc')->get();
    return view('public.transparansi.apbdes', compact('data'));
}

// 2. Realisasi Anggaran
public function realisasi()
{
    $data = Budget::where('category', 'realisasi')->orderBy('year', 'desc')->get();
    return view('public.transparansi.realisasi', compact('data'));
}

// 3. Laporan Penyelenggaraan
public function laporan()
{
    $data = Budget::where('category', 'laporan')->orderBy('year', 'desc')->get();
    return view('public.transparansi.laporan', compact('data'));
}

public function contact()
    {
        $profile = \App\Models\VillageProfile::first();
        return view('public.kontak', compact('profile'));
    }

}