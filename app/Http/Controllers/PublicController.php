<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;

class PublicController extends Controller
{
    /**
     * HALAMAN UTAMA (HOME)
     */
    public function index()
    {
        // Cache Kades Data (24 Jam)
        $kades = \Illuminate\Support\Facades\Cache::remember('home_kades', 60*24, function () {
            return VillageOfficial::where('position', 'like', '%Kepala Desa%')->orderBy('id', 'asc')->first();
        });
        
        // Berita Terkini (3 item) - Cache 30 Menit
        $latestPosts = \Illuminate\Support\Facades\Cache::remember('home_latest_posts', 30, function () {
            return Post::with(['category', 'user']) // Eager Load User juga
                       ->where('is_published', true)
                       ->latest()
                       ->take(3)
                       ->get();
        });
        
        // Potensi Random (3 item) - Cache 60 Menit
        $potentials = \Illuminate\Support\Facades\Cache::remember('home_potentials', 60, function () {
            return VillagePotential::inRandomOrder()->take(3)->get();
        }); 

        return view('public.home', compact('latestPosts', 'potentials', 'kades'));
    }

    /**
     * PROFIL DESA
     */
    public function profile()
    {
        // Kita tampilkan sedikit potensi di sidebar profil
        $potentials = VillagePotential::inRandomOrder()->take(3)->get();
        return view('public.profile', compact('potentials'));
    }

    /**
     * KONTAK KAMI
     */
    public function contact()
    {
        return view('public.kontak');
    }
}