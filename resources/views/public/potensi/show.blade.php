@extends('layouts.app')

@section('title', $potential->title)

@section('content')
    {{-- 1. HERO IMAGE (Parallax) --}}
    <div class="relative h-[60vh] min-h-[400px] overflow-hidden">
        <div class="absolute inset-0 bg-slate-900">
            @if ($potential->image_path)
                <img src="{{ asset('storage/' . $potential->image_path) }}" alt="{{ $potential->title }}"
                    class="w-full h-full object-cover opacity-60 fixed-parallax">
            @else
                <div class="w-full h-full bg-slate-800 opacity-50"></div>
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 h-full flex flex-col justify-end pb-16 md:pb-24">
            <div class="max-w-4xl mx-auto text-center">
                <span
                    class="inline-block bg-amber-500 text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-4 shadow-lg animate-fade-in-up">
                    {{ $potential->category ?? 'Potensi Desa' }}
                </span>
                <h1
                    class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg animate-fade-in-up animation-delay-200">
                    {{ $potential->title }}
                </h1>
            </div>
        </div>
    </div>

    {{-- 2. KONTEN DETAIL --}}
    <div class="bg-gray-50 min-h-screen relative z-30">
        <div class="container mx-auto px-4 lg:px-8 -mt-20 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kolom Kiri: Deskripsi Utama --}}
                <div class="lg:col-span-2">
                    <div
                        class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-slate-200/50 border border-slate-100">
                        <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Tentang Potensi Ini
                        </h3>
                        <article class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed">
                            {!! nl2br(e($potential->description)) !!}
                        </article>
                    </div>
                </div>

                {{-- Kolom Kanan: Info Sidebar --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- Card Info Lokasi / Kontak --}}
                    <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                        <h3 class="font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Detail
                        </h3>

                        <div class="space-y-4">
                            @if ($potential->address)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-bold uppercase block">Lokasi</span>
                                        <span class="text-sm text-slate-700 font-medium">{{ $potential->address }}</span>
                                    </div>
                                </div>
                            @endif

                            {{-- Jika Anda punya kolom 'owner' atau 'contact' di database, tambahkan disini --}}
                            {{-- 
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div>
                                    <span class="text-xs text-slate-400 font-bold uppercase block">Kontak</span>
                                    <span class="text-sm text-slate-700 font-medium">0812-3456-7890</span>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>

                    {{-- Card Potensi Lain --}}
                    @if (isset($others) && $others->count() > 0)
                        <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                            <h3 class="font-bold text-slate-800 mb-4">Lihat Juga</h3>
                            <div class="space-y-4">
                                @foreach ($others as $other)
                                    <a href="{{ route('public.potentials.show', $other->slug) }}" class="flex gap-4 group">
                                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                                            @if ($other->image_path)
                                                <img src="{{ asset('storage/' . $other->image_path) }}"
                                                    class="w-full h-full object-cover group-hover:scale-110 transition">
                                            @endif
                                        </div>
                                        <div>
                                            <h4
                                                class="text-sm font-bold text-slate-700 group-hover:text-amber-600 transition">
                                                {{ $other->title }}</h4>
                                            <span class="text-xs text-slate-400 mt-1 block">Lihat detail &rarr;</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-12 text-center">
                <a href="{{ route('public.potentials') }}"
                    class="inline-flex items-center gap-2 text-slate-500 hover:text-amber-600 font-bold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Potensi
                </a>
            </div>
        </div>
    </div>
@endsection
