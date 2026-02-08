<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Agenda;
use App\Models\Gallery;

class InformationController extends Controller
{
    // 1. BERITA DESA
    public function news()
    {
        $posts = Post::with(['category', 'user'])
            ->where('is_published', true)
            ->whereHas('category', function($q){
                $q->where('slug', '!=', 'pengumuman');
            })->latest()->paginate(9);
        
        return view('public.informasi.berita', compact('posts'));
    }

    public function newsDetail($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        $recentPosts = Post::where('id', '!=', $post->id)
                           ->with('category')
                           ->latest()
                           ->take(5)
                           ->get();

        return view('public.informasi.show', compact('post', 'recentPosts'));
    }

    // 2. PENGUMUMAN
    public function announcements()
    {
        $posts = Post::with(['category', 'user'])
            ->where('is_published', true)
            ->whereHas('category', function($q){
                $q->where('slug', 'pengumuman');
            })->latest()->paginate(10);

        return view('public.informasi.pengumuman', compact('posts'));
    }

    // 3. AGENDA KEGIATAN
    public function agenda()
    {
        $agendas = Agenda::orderBy('date', 'desc')->paginate(9);
        return view('public.informasi.agenda', compact('agendas'));
    }

    // 4. GALERI KEGIATAN
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.informasi.galeri', compact('galleries'));
    }

    // 5. PENCARIAN (Dipindahkan dari PublicController untuk sentralisasi Info)
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        $posts = Post::with(['category', 'user'])
                     ->where('is_published', true)
                     ->where(function($q) use ($query) {
                         $q->where('title', 'like', "%{$query}%")
                           ->orWhere('content', 'like', "%{$query}%");
                     })
                     ->latest()
                     ->get();

        // Kita hapus pencarian potensi disini agar fokus ke informasi/berita saja, 
        // atau tetap digabung tapi logic potensi dipanggil via Model.
        // Untuk saat ini kita simpan logic lama:
        
        $potentials = \App\Models\VillagePotential::where('title', 'like', "%{$query}%")
                                      ->orWhere('description', 'like', "%{$query}%")
                                      ->latest()
                                      ->get();

        return view('public.informasi.pencarian', compact('query', 'posts', 'potentials'));
    }
}
