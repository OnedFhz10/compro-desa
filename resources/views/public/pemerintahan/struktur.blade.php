@extends('layouts.app')
@section('title', 'Struktur Organisasi')
@section('content')

    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Struktur Organisasi</h1>
            <p class="text-slate-400 text-lg">Bagan susunan jabatan dan garis koordinasi pemerintah desa.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="bg-white p-6 lg:p-10 rounded-3xl shadow-xl border border-gray-100">
            @if ($profile->structure_image_path)
                <img src="{{ asset('storage/' . $profile->structure_image_path) }}"
                    class="w-full h-auto rounded-xl shadow-sm">
                <div class="mt-8 text-center">
                    <a href="{{ asset('storage/' . $profile->structure_image_path) }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-blue-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Lihat Ukuran Penuh
                    </a>
                </div>
            @else
                <div class="py-24 text-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
                    <span class="text-6xl block mb-4">📊</span>
                    <h3 class="text-xl font-bold text-slate-600">Bagan Belum Tersedia</h3>
                    <p class="text-slate-500">Admin belum mengunggah gambar struktur organisasi.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
