@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
    {{-- 1. HERO HEADER (Sama Persis dengan Berita) --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-purple-900/30 z-10"></div>
            {{-- Background Image --}}
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=2940&auto=format&fit=crop"
                alt="Galeri Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-purple-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Dokumentasi
                Desa</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Galeri Foto
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Merekam jejak kegiatan, keindahan alam, dan momen penting di {{ $profile?->village_name ?? 'Desa' }}.
            </p>
        </div>
    </section>

    {{-- 2. LIST GALERI --}}
    <div class="bg-gray-50 py-20 min-h-screen relative z-30 -mt-10 pt-10">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up animation-delay-500">
                    @foreach ($galleries as $gallery)
                        {{-- Menggunakan struktur 'article' dan class yang sama persis dengan Berita --}}
                        <article
                            class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full">

                            {{-- Gambar Thumbnail (Wajib h-60 agar seragam) --}}
                            <div class="relative h-60 overflow-hidden">
                                <div class="absolute inset-0 bg-slate-200 animate-pulse"></div> {{-- Placeholder --}}
                                @if ($gallery->image_path)
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                        <svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                {{-- Badge Kategori (Statis) --}}
                                <div class="absolute top-4 left-4 z-10">
                                    <span
                                        class="bg-purple-600/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                                        Foto
                                    </span>
                                </div>

                                {{-- Overlay Gradient --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60">
                                </div>
                            </div>

                            {{-- Konten --}}
                            <div class="p-8 flex flex-col flex-1 relative">
                                {{-- Dekorasi Garis Atas (Ganti warna jadi Purple agar beda dikit) --}}
                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                </div>

                                {{-- Meta Tanggal --}}
                                <div class="flex items-center text-xs text-slate-400 mb-4 space-x-2">
                                    <span class="flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $gallery->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                {{-- Judul --}}
                                <h2
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-purple-600 transition-colors">
                                    {{ $gallery->title }}
                                </h2>

                                {{-- Deskripsi (Ganti Excerpt) --}}
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed flex-1">
                                    {{ $gallery->description ?? 'Tidak ada deskripsi.' }}
                                </p>

                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-16 flex justify-center animate-fade-in-up animation-delay-700">
                    {{ $galleries->links() }}
                </div>
            @else
                <div
                    class="bg-white rounded-[2rem] p-16 text-center shadow-xl shadow-slate-200/50 border border-slate-100 max-w-2xl mx-auto">
                    <div class="text-7xl mb-6">📷</div>
                    <h3 class="text-2xl font-bold text-slate-700">Galeri Kosong</h3>
                    <p class="text-slate-500 mt-3">Belum ada foto yang diunggah ke galeri.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
