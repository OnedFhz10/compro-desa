@extends('layouts.app')

@section('title', 'Lembaga Desa')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=60&w=1200&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40" width="1200" height="400" loading="eager">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Kemasyarakatan</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up">
                Lembaga Desa
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up">
                Mitra strategis pemerintah dalam pembangunan dan pemberdayaan masyarakat.
            </p>
        </div>
    </section>

    {{-- BREADCRUMB --}}
    <div class="bg-slate-50 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Pemerintahan</span>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Lembaga Desa</span>
            </nav>
        </div>
    </div>

    {{-- 2. CONTENT LIST LEMBAGA --}}
    <div class="bg-gray-50 py-20 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($institutions->count() > 0)
                {{-- Menggunakan grid-cols-4 agar sama dengan Perangkat Desa --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($institutions as $item)
                        <a href="{{ route('public.government.institutions.show', $item->slug) }}"
                            class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 flex flex-col items-center text-center relative overflow-hidden animate-fade-in-up">

                            {{-- Dekorasi Background Atas (PERSIS PERANGKAT) --}}
                            <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-blue-50 to-transparent">
                            </div>

                            {{-- FOTO BULAT (UKURAN w-40 h-40 PERSIS PERANGKAT) --}}
                            <div class="relative z-10 mb-6">
                                <div
                                    class="w-40 h-40 rounded-full p-1.5 bg-white shadow-md border border-slate-200 group-hover:scale-105 transition-transform duration-300">
                                    <div
                                        class="w-full h-full rounded-full overflow-hidden relative flex items-center justify-center bg-slate-50">
                                        {{-- LOGIKA GAMBAR --}}
                                        @if ($item->image_path)
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}"
                                                class="w-full h-full object-cover rounded-full">
                                        @else
                                            {{-- Fallback Icon (Jika tidak ada logo) --}}
                                            <svg class="w-16 h-16 text-slate-300 group-hover:text-blue-400 transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- INFORMASI TEXT --}}
                            <div class="relative z-10 w-full">
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
                                    {{ $item->name }}
                                </h3>

                                {{-- Garis Pembatas Kecil --}}
                                <div class="w-10 h-1 bg-slate-200 mx-auto mb-4 rounded-full"></div>

                                {{-- Deskripsi Singkat (Sebagai pengganti Jabatan/NIP) --}}
                                <p class="text-slate-500 text-sm line-clamp-2 mb-6 leading-relaxed">
                                    {{ $item->description ?? 'Mitra strategis pemerintah desa.' }}
                                </p>

                                {{-- Tombol Detail (Konsisten) --}}
                                <span
                                    class="inline-flex items-center justify-center w-full py-2.5 px-4 rounded-full bg-blue-50 text-blue-600 font-bold text-xs uppercase tracking-wide group-hover:bg-blue-600 group-hover:text-white transition-all">
                                    Lihat Detail
                                </span>
                            </div>

                        </a>
                    @endforeach
                </div>
            @else
                {{-- Tampilan Kosong (PERSIS PERANGKAT) --}}
                <div class="bg-white rounded-3xl p-12 text-center shadow-lg border border-slate-100">
                    <div class="text-6xl mb-4">🏛️</div>
                    <h3 class="text-xl font-bold text-slate-700">Data Belum Tersedia</h3>
                    <p class="text-slate-500 mt-2">Daftar lembaga desa belum ditambahkan.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
