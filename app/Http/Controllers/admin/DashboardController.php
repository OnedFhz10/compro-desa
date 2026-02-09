<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Utama
        $stats = [
            'total_posts'     => Post::count(),
            'total_potentials'=> VillagePotential::count(),
            'total_officials' => VillageOfficial::count(),
            'total_galleries' => Gallery::count(),
        ];

        // 2. Ambil 3 Berita Terbaru
        $recentPosts = Post::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts'));
    }
}