@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    {{-- 1. HERO HEADER (Refactored to Component) --}}
    <x-hero 
        title="Berita & Artikel" 
        subtitle="Informasi Terkini"
        image="https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=60&w=1200&auto=format&fit=crop"
    >
        Kabar terbaru, kegiatan, dan informasi penting seputar {{ $profile?->village_name ?? 'Desa' }}.
    </x-hero>

    {{-- BREADCRUMB --}}
    <div class="bg-slate-50 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Informasi</span>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Berita & Artikel</span>
            </nav>
        </div>
    </div>

    {{-- 2. LIST BERITA --}}
    <div class="bg-gray-50 py-20 min-h-screen relative z-30 -mt-10 pt-10">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up animation-delay-500">
                    @foreach ($posts as $post)
                        <article
                            class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full">

                            {{-- Gambar Thumbnail --}}
                            <div class="relative h-60 overflow-hidden">
                                <div class="absolute inset-0 bg-slate-200 animate-pulse"></div> {{-- Placeholder loading --}}
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <img src="https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=2940&auto=format&fit=crop"
                                        alt="Default"
                                        class="w-full h-full object-cover opacity-50 grayscale group-hover:grayscale-0 transition duration-500">
                                @endif

                                {{-- Badge Kategori --}}
                                <div class="absolute top-4 left-4 z-10">
                                    <span
                                        class="bg-blue-600/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                                        {{ $post->category->name ?? 'Umum' }}
                                    </span>
                                </div>

                                {{-- Overlay Gradient --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60">
                                </div>
                            </div>

                            {{-- Konten --}}
                            <div class="p-8 flex flex-col flex-1 relative">
                                {{-- Dekorasi Garis Atas --}}
                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
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
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        {{ $post->user->name ?? 'Admin' }}
                                    </span>
                                </div>

                                {{-- Judul --}}
                                <h2
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors">
                                    <a href="{{ route('public.news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                {{-- Excerpt --}}
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed flex-1">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                                </p>

                                {{-- Tombol Baca --}}
                                <div class="mt-auto pt-6 border-t border-slate-100">
                                    <a href="{{ route('public.news.show', $post->slug) }}"
                                        class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-700 transition group/link">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-16 flex justify-center animate-fade-in-up animation-delay-700">
                    {{ $posts->links() }}
                </div>
            @else
                <div
                    class="bg-white rounded-[2rem] p-16 text-center shadow-xl shadow-slate-200/50 border border-slate-100 max-w-2xl mx-auto">
                    <div class="text-7xl mb-6">📰</div>
                    <h3 class="text-2xl font-bold text-slate-700">Belum Ada Berita</h3>
                    <p class="text-slate-500 mt-3">Saat ini belum ada berita atau artikel yang diterbitkan.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
