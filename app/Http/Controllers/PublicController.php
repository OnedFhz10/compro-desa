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
// Note: VillageProfile tidak perlu di-use lagi jika tidak dipakai logika khusus

class PublicController extends Controller
{
    // 1. Halaman Beranda (Home)
    public function index()
    {
        // $profile otomatis disuntikkan oleh AppServiceProvider
        
        $kades = VillageOfficial::where('position', 'like', '%Kepala Desa%')->first();
        $latestPosts = Post::with('category')->latest()->take(3)->get(); 
        $potentials = VillagePotential::inRandomOrder()->take(3)->get(); 

        return view('public.home', compact('latestPosts', 'potentials', 'kades'));
    }

    // 2. Halaman Profil Desa
    public function profile()
    {
        $potentials = VillagePotential::inRandomOrder()->take(3)->get();
        return view('public.profile', compact('potentials'));
    }

    // 3. Halaman Daftar Berita
    public function news()
    {
        $posts = Post::whereHas('category', function($q){
            $q->where('name', '!=', 'Pengumuman');
        })->latest()->paginate(9);
        
        return view('public.informasi.berita', compact('posts'));
    }

    // 4. Pengumuman
    public function announcements()
    {
        $posts = Post::whereHas('category', function($q){
            $q->where('name', 'Pengumuman');
        })->latest()->paginate(10);

        return view('public.informasi.pengumuman', compact('posts'));
    }

    // 5. Agenda
    public function agenda()
    {
        $agendas = Agenda::where('event_date', '>=', now())
                        ->orderBy('event_date', 'asc')
                        ->paginate(9);
                        
        return view('public.informasi.agenda', compact('agendas'));
    }

    // 6. Galeri
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.informasi.galeri', compact('galleries'));
    }

    // 7. Detail Berita
    public function newsDetail($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->firstOrFail();
        
        $recentPosts = Post::where('id', '!=', $post->id)
                           ->with('category')
                           ->latest()
                           ->take(5)
                           ->get();

        return view('public.informasi.show', compact('post', 'recentPosts'));
    }

    // 8. Semua Potensi
    public function potentials()
    {
        $potentials = VillagePotential::latest()->paginate(9);
        $pageTitle = 'Semua Potensi Desa';
        $pageDescription = 'Jelajahi seluruh kekayaan alam, produk, dan usaha lokal desa kami.';
        
        return view('public.potensi.index', compact('potentials', 'pageTitle', 'pageDescription'));
    }

    // 9. Potensi Kategori
    public function potentialsByCategory($slug)
    {
        $categories = [
            'wisata' => 'Wisata',
            'umkm'   => 'UMKM',
            'produk' => 'Produk'
        ];

        $categoryName = $categories[$slug] ?? abort(404);

        $potentials = VillagePotential::where('category', $categoryName)
                            ->latest()
                            ->paginate(9);

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

    // 10. Struktur Organisasi
    public function structure()
    {
        return view('public.pemerintahan.struktur');
    }

    // 11. Perangkat Desa
    public function officials()
    {
        $officials = VillageOfficial::orderBy('id', 'asc')->get();
        return view('public.pemerintahan.perangkat', compact('officials'));
    }

    // 12. Lembaga Desa
    public function institutions()
    {
        $institutions = VillageInstitution::all();
        return view('public.pemerintahan.lembaga', compact('institutions'));
    }

    public function showInstitution($slug)
    {
        $institution = VillageInstitution::where('name', 'like', '%' . $slug . '%')->first();
        $pageTitle = strtoupper(str_replace('-', ' ', $slug));
        
        return view('public.pemerintahan.lembaga_show', compact('institution', 'pageTitle'));
    }

    // 13. RT / RW
    public function rtrw()
    {
        $neighborhoods = Neighborhood::orderBy('dusun')->orderBy('rw')->orderBy('rt')->get()
                                         ->groupBy(['dusun', 'rw']);
        return view('public.pemerintahan.rt_rw', compact('neighborhoods'));
    }

    // 14. Transparansi (APBDes)
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

    public function contact()
    {
        return view('public.kontak');
    }

    // 15. Pencarian
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        $posts = Post::where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->with('category')
                    ->latest()
                    ->get();

        $potentials = VillagePotential::where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->latest()
                    ->get();

        return view('public.informasi.pencarian', compact('query', 'posts', 'potentials'));
    }
}