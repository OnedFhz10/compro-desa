<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\VillageOfficial;
use App\Models\VillagePotential;
use App\Models\LetterRequest;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Utama
        $stats = [
            'pending_letters' => LetterRequest::where('status', 'pending')->count(),
            'total_posts'     => Post::count(),
            'total_potentials'=> VillagePotential::count(),
            'total_officials' => VillageOfficial::count(),
        ];

        // 2. Ambil 5 Surat Terbaru (Untuk Quick Action)
        $recentLetters = LetterRequest::latest()->take(5)->get();

        // 3. Ambil 3 Berita Terbaru
        $recentPosts = Post::with('category')->latest()->take(3)->get();

        // 4. Data Chart: Statistik Surat Berdasarkan Status
        $letterChart = [
            'pending'  => LetterRequest::where('status', 'pending')->count(),
            'processed'=> LetterRequest::where('status', 'proses')->count(),
            'finished' => LetterRequest::where('status', 'selesai')->count(),
            'rejected' => LetterRequest::where('status', 'ditolak')->count(),
        ];

        return view('admin.dashboard', compact('stats', 'recentLetters', 'recentPosts', 'letterChart'));
    }
}