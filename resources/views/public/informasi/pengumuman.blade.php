@extends('layouts.app')

@section('title', 'Pengumuman Desa')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?q=80&w=2932&auto=format&fit=crop"
                alt="Pengumuman Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Informasi
                Publik</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Pengumuman Resmi
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Pemberitahuan penting, himbauan, dan informasi resmi dari pemerintah desa untuk masyarakat.
            </p>
        </div>
    </section>

    {{-- 2. LIST PENGUMUMAN --}}
    <div class="bg-gray-50 py-20 min-h-screen relative z-30 -mt-10 pt-10">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($posts->count() > 0)
                <div class="max-w-5xl mx-auto space-y-6 animate-fade-in-up animation-delay-500">
                    @foreach ($posts as $post)
                        <div
                            class="bg-white rounded-[2rem] p-6 md:p-8 shadow-xl shadow-slate-200/50 border border-slate-100 hover:border-blue-300 transition-all duration-300 flex flex-col md:flex-row gap-6 md:gap-8 group">

                            {{-- Tanggal (Box Kiri) --}}
                            <div
                                class="flex-shrink-0 flex md:flex-col items-center justify-center bg-blue-50 text-blue-600 rounded-2xl w-full md:w-24 h-16 md:h-auto md:aspect-square p-2 border border-blue-100">
                                <span
                                    class="text-3xl font-extrabold leading-none">{{ $post->created_at->format('d') }}</span>
                                <span
                                    class="text-xs font-bold uppercase tracking-widest">{{ $post->created_at->format('M Y') }}</span>
                            </div>

                            {{-- Konten --}}
                            <div class="flex-1 flex flex-col justify-center">
                                <div class="flex items-center gap-2 mb-2">
                                    <span
                                        class="bg-red-100 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wide border border-red-200">
                                        Penting
                                    </span>
                                    <span class="text-xs text-slate-400 flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <h2
                                    class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                    <a href="{{ route('public.news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <p class="text-slate-500 text-sm line-clamp-2 mb-4">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                {{-- Jika ada gambar lampiran --}}
                                @if ($post->image_path)
                                    <div
                                        class="flex items-center gap-2 mb-4 p-3 bg-slate-50 rounded-xl border border-slate-100 w-fit">
                                        <div class="w-8 h-8 rounded bg-white border border-slate-200 overflow-hidden">
                                            <img src="{{ asset('storage/' . $post->image_path) }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <span class="text-xs text-slate-500 font-medium">Ada lampiran gambar</span>
                                    </div>
                                @endif

                                <div>
                                    <a href="{{ route('public.news.show', $post->slug) }}"
                                        class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition">
                                        Baca Detail Pengumuman &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center animate-fade-in-up animation-delay-700">
                    {{ $posts->links() }}
                </div>
            @else
                <div
                    class="bg-white rounded-[2rem] p-16 text-center shadow-xl shadow-slate-200/50 border border-slate-100 max-w-2xl mx-auto">
                    <div class="text-7xl mb-6">📢</div>
                    <h3 class="text-2xl font-bold text-slate-700">Tidak Ada Pengumuman</h3>
                    <p class="text-slate-500 mt-3">Saat ini belum ada pengumuman terbaru dari pemerintah desa.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
