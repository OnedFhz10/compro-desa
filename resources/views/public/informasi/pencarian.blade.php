@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $query)

@section('content')
    {{-- HEADER SECTION --}}
    <section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        {{-- Gradient Overlay --}}
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[120px] opacity-20 -translate-y-1/2 translate-x-1/3">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-xs font-bold tracking-wider mb-4">
                SEARCH RESULT
            </span>
            <h1 class="text-3xl lg:text-5xl font-extrabold text-white mb-4">
                Menampilkan hasil untuk: <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">"{{ $query }}"</span>
            </h1>
            <p class="text-slate-400 text-lg">
                Ditemukan total {{ $posts->count() + $potentials->count() }} data yang cocok dengan kata kunci tersebut.
            </p>
        </div>
    </section>

    {{-- CONTENT SECTION --}}
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- JIKA TIDAK ADA HASIL --}}
            @if ($posts->count() == 0 && $potentials->count() == 0)
                <div class="max-w-lg mx-auto text-center py-12">
                    <div
                        class="w-24 h-24 bg-slate-200 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400 text-4xl">
                        🔍
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Oops, tidak ditemukan!</h3>
                    <p class="text-slate-500 mb-8">
                        Kami tidak dapat menemukan berita atau potensi dengan kata kunci
                        "<strong>{{ $query }}</strong>". Coba gunakan kata kunci lain.
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-full font-bold hover:bg-blue-700 transition shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            @endif

            {{-- 1. HASIL BERITA --}}
            @if ($posts->count() > 0)
                <div class="mb-16">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-1.5 h-8 bg-blue-600 rounded-full"></span>
                        <h2 class="text-2xl font-bold text-slate-800">Berita & Informasi</h2>
                        <span
                            class="bg-blue-100 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full">{{ $posts->count() }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            <article
                                class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col h-full group">
                                {{-- Image --}}
                                <div class="relative h-48 overflow-hidden bg-slate-200">
                                    @if ($post->image_path)
                                        <img src="{{ asset('storage/' . $post->image_path) }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                    <span
                                        class="absolute top-4 left-4 bg-white/90 backdrop-blur text-xs font-bold text-blue-700 px-3 py-1 rounded-full shadow-sm">
                                        {{ $post->category?->name ?? 'Umum' }}
                                    </span>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $post->created_at->translatedFormat('d F Y') }}
                                    </div>
                                    <h3
                                        class="text-lg font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition">
                                        <a href="{{ route('public.news.show', $post->slug) }}">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h3>
                                    <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-grow">
                                        {{ $post->excerpt }}
                                    </p>
                                    <a href="{{ route('public.news.show', $post->slug) }}"
                                        class="inline-flex items-center text-blue-600 text-sm font-bold hover:underline mt-auto">
                                        Baca Selengkapnya <span
                                            class="ml-1 group-hover:translate-x-1 transition">&rarr;</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 2. HASIL POTENSI --}}
            @if ($potentials->count() > 0)
                <div class="mb-12">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-1.5 h-8 bg-emerald-500 rounded-full"></span>
                        <h2 class="text-2xl font-bold text-slate-800">Potensi Desa</h2>
                        <span
                            class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full">{{ $potentials->count() }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($potentials as $item)
                            <a href="{{ route('public.potentials') }}"
                                class="flex bg-white rounded-2xl p-4 shadow-sm border border-gray-100 hover:shadow-md hover:border-emerald-200 transition group">
                                {{-- Thumbnail Mini --}}
                                <div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden bg-slate-100">
                                    @if ($item->image_path)
                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 text-2xl">
                                            🌳</div>
                                    @endif
                                </div>
                                {{-- Text --}}
                                <div class="ml-4 flex flex-col justify-center">
                                    <span
                                        class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 mb-1">{{ $item->category }}</span>
                                    <h4
                                        class="font-bold text-slate-800 leading-tight mb-1 group-hover:text-emerald-700 transition">
                                        {{ $item->title }}</h4>
                                    <p class="text-xs text-slate-500 line-clamp-2">{{ Str::limit($item->description, 60) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
