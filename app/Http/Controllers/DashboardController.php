<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// PENTING: Jangan lupa import model-model ini
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total data untuk Statistik
        $stats = [
            'posts'      => Post::count(),
            'officials'  => VillageOfficial::count(),
            'potentials' => VillagePotential::count(),
            'galleries'  => Gallery::count(),
        ];

        // 2. Ambil 5 berita terbaru
        $recentPosts = Post::with('category')->latest()->take(5)->get();

        // 3. Tampilkan ke view dashboard
        return view('admin.dashboard', compact('stats', 'recentPosts'));
    }
}