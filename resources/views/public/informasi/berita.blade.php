@extends('layouts.app')

@section('title', 'Berita & Informasi')
@section('meta_description', 'Daftar berita terbaru, kegiatan, dan informasi terkini dari Pemerintah Desa.')

@section('content')

    {{-- HEADER --}}
    <section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Arsip
                Digital</span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-6 animate-fade-in-up animation-delay-200">
                Kabar Desa Terkini
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Ikuti perkembangan terbaru, program kerja, dan kegiatan kemasyarakatan yang terjadi di desa kami.
            </p>
        </div>
    </section>

    {{-- LIST BERITA --}}
    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article
                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col h-full group">
                        {{-- Image Container --}}
                        <div class="relative h-52 overflow-hidden bg-slate-200">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                    loading="lazy" {{-- OPTIMASI WAJIB --}}
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

                            {{-- Category Badge --}}
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-xs font-bold text-blue-700 px-3 py-1 rounded-full shadow-sm uppercase tracking-wide">
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

                            <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-grow leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <a href="{{ route('public.news.show', $post->slug) }}"
                                class="inline-flex items-center text-blue-600 text-sm font-bold hover:underline mt-auto">
                                Baca Selengkapnya <span class="ml-1 group-hover:translate-x-1 transition">&rarr;</span>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-gray-100">
                        <div class="text-6xl mb-4">📰</div>
                        <h3 class="text-xl font-bold text-slate-600">Belum ada berita</h3>
                        <p class="text-slate-400">Silakan cek kembali nanti.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>

@endsection
