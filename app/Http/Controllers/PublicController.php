<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    // =================================================================
    // HALAMAN UTAMA & PROFIL
    // =================================================================

    public function index()
    {
        // Mengambil data Kepala Desa
        $kades = VillageOfficial::where('position', 'like', '%Kepala Desa%')->first();
        
        // Berita Terkini (3 item)
        $latestPosts = Post::with('category')->latest()->take(3)->get(); 
        
        // Potensi Random (3 item)
        $potentials = VillagePotential::inRandomOrder()->take(3)->get(); 

        return view('public.home', compact('latestPosts', 'potentials', 'kades'));
    }

    public function profile()
    {
        // Di halaman profil biasanya ada sidebar potensi
        $potentials = VillagePotential::inRandomOrder()->take(3)->get();
        return view('public.profile', compact('potentials'));
    }

    // =================================================================
    // INFORMASI (Berita, Pengumuman, Agenda, Galeri)
    // =================================================================

    public function news()
    {
        $posts = Post::whereHas('category', function($q){
            $q->where('name', '!=', 'Pengumuman');
        })->latest()->paginate(9);
        
        return view('public.informasi.berita', compact('posts'));
    }

    public function announcements()
    {
        $posts = Post::whereHas('category', function($q){
            $q->where('name', 'Pengumuman');
        })->latest()->paginate(10);

        return view('public.informasi.pengumuman', compact('posts'));
    }

    public function agenda()
    {
        // Menampilkan agenda, yang terbaru (berdasarkan tanggal acara) paling atas
        $agendas = Agenda::orderBy('date', 'desc')->paginate(9);
        
        return view('public.informasi.agenda', compact('agendas'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.informasi.galeri', compact('galleries'));
    }

    public function newsDetail($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->firstOrFail();
        
        // Sidebar berita terbaru selain yang sedang dibuka
        $recentPosts = Post::where('id', '!=', $post->id)
                           ->with('category')
                           ->latest()
                           ->take(5)
                           ->get();

        return view('public.informasi.show', compact('post', 'recentPosts'));
    }

    // =================================================================
    // POTENSI DESA (Sudah Diperbaiki Pagination-nya)
    // =================================================================

    public function potential()
    {
        // FIX: Menggunakan paginate() agar method links() di view bekerja
        $potentials = VillagePotential::latest()->paginate(9);

        // Mengambil kategori unik untuk filter di frontend
        $categories = VillagePotential::select('category')->distinct()->pluck('category');

        return view('public.potensi.index', compact('potentials', 'categories'));
    }

    // Method tambahan untuk fitur Filter via URL (jika dropdown navbar diklik)
    // Opsional: Jika Anda ingin route('public.potentials.category') bekerja
    public function potentialByCategory($category)
    {
        $potentials = VillagePotential::where('category', $category)->latest()->paginate(9);
        $categories = VillagePotential::select('category')->distinct()->pluck('category');
        
        // Kita gunakan view yang sama (index), tapi datanya sudah difilter
        return view('public.potensi.index', compact('potentials', 'categories'));
    }

    public function showPotential($slug)
    {
        $potential = VillagePotential::where('slug', $slug)->firstOrFail();
        $others = VillagePotential::where('id', '!=', $potential->id)->inRandomOrder()->limit(3)->get();

        return view('public.potensi.show', compact('potential', 'others'));
    }

    // =================================================================
    // PEMERINTAHAN
    // =================================================================

    public function structure()
    {
        return view('public.pemerintahan.struktur');
    }

    public function officials()
    {
        // Urutkan berdasarkan ID atau hierarki jabatan jika ada kolom 'order'
        $officials = VillageOfficial::orderBy('id', 'asc')->get();
        return view('public.pemerintahan.perangkat', compact('officials'));
    }

    public function institutions()
    {
        $institutions = VillageInstitution::all();
        return view('public.pemerintahan.lembaga', compact('institutions'));
    }

    public function showInstitution($slug)
    {
        // Note: Logic ini mencari berdasarkan nama yang mirip slug. 
        // Idealnya tabel village_institutions punya kolom 'slug'.
        $name = str_replace('-', ' ', $slug);
        $institution = VillageInstitution::where('name', 'like', '%' . $name . '%')->firstOrFail();
        
        $pageTitle = $institution->name;
        
        return view('public.pemerintahan.lembaga_show', compact('institution', 'pageTitle'));
    }

    public function rtrw()
    {
        // Grouping data RT/RW berdasarkan Dusun -> RW
        $neighborhoods = Neighborhood::orderBy('dusun')->orderBy('rw')->orderBy('rt')->get()
                                     ->groupBy(['dusun', 'rw']);
        return view('public.pemerintahan.rt_rw', compact('neighborhoods'));
    }

    // =================================================================
    // TRANSPARANSI
    // =================================================================

    public function apbdes()
    {
        $data = Budget::where('category', 'apbdes')->orderBy('year', 'desc')->get();
        return view('public.transparansi.apbdes', compact('data'));
    }

    public function realisasi()
    {
        $data = Budget::where('category', 'realisasi')->orderBy('year', 'desc')->get();
        return view('public.transparansi.realisasi', compact('data'));
    }

    public function laporan()
    {
        $data = Budget::where('category', 'laporan')->orderBy('year', 'desc')->get();
        return view('public.transparansi.laporan', compact('data'));
    }

    // =================================================================
    // LAYANAN WARGA (YANG HILANG SEBELUMNYA)
    // =================================================================

    public function layananSurat()
    {
        // Pastikan Anda membuat file view: resources/views/public/layanan/surat.blade.php
        return view('public.layanan.surat');
    }

    public function layananStatus()
    {
        // Pastikan Anda membuat file view: resources/views/public/layanan/status.blade.php
        return view('public.layanan.status');
    }

    public function layananPengaduan()
    {
        // Pastikan Anda membuat file view: resources/views/public/layanan/pengaduan.blade.php
        return view('public.layanan.pengaduan');
    }

    // =================================================================
    // KONTAK & PENCARIAN
    // =================================================================

    public function contact()
    {
        return view('public.kontak');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        // Pencarian di Berita
        $posts = Post::where('title', 'like', "%{$query}%")
                     ->orWhere('content', 'like', "%{$query}%")
                     ->with('category')
                     ->latest()
                     ->get();

        // Pencarian di Potensi
        $potentials = VillagePotential::where('title', 'like', "%{$query}%")
                                      ->orWhere('description', 'like', "%{$query}%")
                                      ->latest()
                                      ->get();

        return view('public.informasi.pencarian', compact('query', 'posts', 'potentials'));
    }
}