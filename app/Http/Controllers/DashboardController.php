<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;
use App\Models\LetterRequest; // Pastikan model ini ada
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Utama
        $stats = [
            // Hitung surat yang statusnya masih 'pending'
            'pending_letters' => LetterRequest::where('status', 'pending')->count(),
            'total_posts'     => Post::count(),
            'total_potentials'=> VillagePotential::count(),
            'total_officials' => VillageOfficial::count(),
        ];

        // 2. Ambil 5 Surat Terbaru (Untuk Quick Action)
        // Asumsi relasi user ada (jika surat dibuat oleh user login), atau field nama_pemohon
        $recentLetters = LetterRequest::latest()
            ->take(5)
            ->get();

        // 3. Ambil 5 Berita Terbaru
        $recentPosts = Post::with('category')
            ->latest()
            ->take(3)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentLetters', 'recentPosts'));
    }
}