@extends('layouts.app')

{{-- META DATA DINAMIS --}}
@section('title', $post->title)
@section('meta_description', Str::limit(strip_tags($post->content), 150))
@if ($post->image_path)
    @section('meta_image', asset('storage/' . $post->image_path))
@endif

@section('content')
    {{-- HEADER GAMBAR (Parallax Effect) --}}
    <div class="relative h-[400px] md:h-[500px] overflow-hidden">
        <div class="absolute inset-0 bg-slate-900/50 z-10"></div>
        
        @if ($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover fixed-parallax" loading="eager">
        @else
            <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                <span class="text-white font-bold">No Image Available</span>
            </div>
        @endif

        <div
            class="absolute bottom-0 left-0 w-full z-20 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent pt-32 pb-10">
            <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
                <span
                    class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4 inline-block animate-fade-in-up">
                    {{ $post->category?->name ?? 'Berita' }}
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-4 shadow-sm animate-fade-in-up">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center gap-6 text-slate-300 text-sm font-medium animate-fade-in-up">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $post->created_at->translatedFormat('d F Y, H:i') }} WIB
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Admin Desa
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- BREADCRUMB --}}
    <div class="bg-slate-50 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Informasi</span>
                <span class="mx-2">/</span>
                <a href="{{ route('public.news.index') }}" class="hover:text-blue-600 transition-colors">
                    {{ $post->category->name ?? 'Berita' }}
                </a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">{{ Str::limit($post->title, 30) }}</span>
            </nav>
        </div>
    </div>

    <div class="bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                {{-- KONTEN UTAMA --}}
                <div class="lg:col-span-8">
                    <article class="prose prose-lg prose-slate max-w-none text-slate-700 leading-relaxed">
                        {!! nl2br(e($post->content)) !!}
                    </article>

                    {{-- Tombol Share --}}
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h4 class="font-bold text-slate-800 mb-4">Bagikan Berita Ini:</h4>
                        <div class="flex gap-2">
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}"
                                target="_blank"
                                class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-green-600 transition flex items-center gap-2">
                                WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition flex items-center gap-2">
                                Facebook
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <div class="lg:col-span-4 space-y-10">

                    {{-- Berita Terbaru Widget --}}
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <h3
                            class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2 border-l-4 border-blue-600 pl-3">
                            Berita Lainnya
                        </h3>
                        <div class="space-y-6">
                            @foreach ($recentPosts as $recent)
                                <a href="{{ route('public.news.show', $recent->slug) }}"
                                    class="group flex gap-4 items-start">
                                    <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-slate-200">
                                        @if ($recent->image_path)
                                            <img src="{{ asset('storage/' . $recent->image_path) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500" loading="lazy">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center text-xs text-slate-400">
                                                No Img</div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4
                                            class="text-sm font-bold text-slate-800 leading-snug mb-1 group-hover:text-blue-600 transition line-clamp-2">
                                            {{ $recent->title }}
                                        </h4>
                                        <span
                                            class="text-xs text-slate-400">{{ $recent->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                            <a href="{{ route('public.news.index') }}"
                                class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat Semua Berita &rarr;</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
