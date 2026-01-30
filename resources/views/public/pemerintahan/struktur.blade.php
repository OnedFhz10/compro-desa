@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
    {{-- 1. HERO HEADER (Konsisten) --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        {{-- Background Gradient & Image --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            {{-- Menggunakan gambar random atau bisa diganti foto desa --}}
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=2874&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40">
        </div>

        {{-- Judul Halaman --}}
        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Pemerintahan</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Struktur Organisasi
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Bagan tata kelola pemerintahan {{ $profile?->village_name ?? 'Desa' }} yang transparan.
            </p>
        </div>
    </section>

    {{-- 2. CONTENT (Menumpuk ke atas) --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-20">
        <div
            class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-4 lg:p-8 border border-gray-100 animate-fade-in-up animation-delay-500">

            {{-- PERBAIKAN: Gunakan structure_image_path (sesuai database/controller) --}}
            @if ($profile && $profile->structure_image_path)
                <div class="relative w-full overflow-hidden rounded-2xl group">
                    <img src="{{ asset('storage/' . $profile->structure_image_path) }}" alt="Struktur Organisasi"
                        class="w-full h-auto object-contain">

                    {{-- Tombol Zoom --}}
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <a href="{{ asset('storage/' . $profile->structure_image_path) }}" target="_blank"
                            class="bg-white text-slate-900 px-6 py-3 rounded-full font-bold shadow-lg hover:bg-blue-50 transition transform hover:scale-105">
                            Lihat Ukuran Penuh
                        </a>
                    </div>
                </div>
            @else
                {{-- Tampilan Kosong --}}
                <div class="text-center py-20 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h3 class="text-lg font-semibold text-slate-500">Belum ada bagan struktur</h3>
                    <p class="text-slate-400">Admin belum mengunggah gambar struktur organisasi.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
