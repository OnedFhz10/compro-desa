@extends('layouts.app')

@section('title', 'Profil Desa')
@section('meta_description', 'Sejarah, Visi Misi, dan Profil lengkap Pemerintah Desa.')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        {{-- Background Image dengan Fallback --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            {{-- Gunakan foto desa jika ada, atau gambar random jika tidak ada --}}
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=2813&auto=format&fit=crop"
                alt="Background Desa" class="w-full h-full object-cover opacity-50">
        </div>

        <div class="container mx-auto px-4 relative z-20 text-center pt-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-2">Profil & Identitas</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Mengenal lebih dalam {{ $profile?->village_name ?? 'Desa Kami' }}.
            </p>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KONTEN UTAMA (Kiri) --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Sejarah --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4 border-b pb-2">Sejarah Desa</h2>
                    <div class="prose max-w-none text-slate-600 leading-relaxed text-justify">
                        @if ($profile?->history)
                            {{-- Mengubah enter menjadi <br> --}}
                            {!! nl2br(e($profile->history)) !!}
                        @else
                            <p class="italic text-slate-400">Data sejarah belum ditambahkan oleh admin.</p>
                        @endif
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Visi --}}
                    <div class="bg-blue-800 text-white rounded-2xl p-6 shadow-lg">
                        <h3 class="text-xl font-bold mb-3 border-b border-blue-600 pb-2">Visi</h3>
                        <p class="italic text-lg opacity-90">
                            "{{ $profile?->vision ?? 'Belum ada visi.' }}"
                        </p>
                    </div>

                    {{-- Misi --}}
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-emerald-500">
                        <h3 class="text-xl font-bold mb-3 text-slate-800">Misi</h3>
                        @if ($profile?->mission)
                            <ul class="space-y-2">
                                {{-- Memecah misi per baris untuk dijadikan list --}}
                                @foreach (explode("\n", $profile->mission) as $misi)
                                    @if (trim($misi))
                                        <li class="flex items-start gap-2 text-slate-600">
                                            <svg class="w-5 h-5 text-emerald-500 mt-1 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>{{ $misi }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-slate-400 italic">Belum ada misi.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- SIDEBAR (Kanan) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center">
                    {{-- Logo Desa --}}
                    @if ($profile?->logo_path)
                        <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo Desa"
                            class="w-32 h-32 mx-auto mb-4 object-contain">
                    @else
                        {{-- Placeholder jika tidak ada logo --}}
                        <div
                            class="w-32 h-32 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                            No Logo
                        </div>
                    @endif

                    <h3 class="font-bold text-xl text-slate-800 mb-1">{{ $profile?->village_name }}</h3>
                    <p class="text-sm text-slate-500 uppercase tracking-wide mb-6">Pemerintah Desa</p>

                    <div class="text-left space-y-4 text-sm text-slate-600 border-t pt-4">
                        <div>
                            <strong>Alamat:</strong><br>
                            {{ $profile?->address ?? '-' }}
                        </div>
                        <div>
                            <strong>Email:</strong><br>
                            {{ $profile?->email ?? '-' }}
                        </div>
                        <div>
                            <strong>Telepon:</strong><br>
                            {{ $profile?->phone ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
