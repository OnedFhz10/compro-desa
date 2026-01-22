@extends('layouts.app')

@section('title', 'Profil Desa')
@section('meta_description', 'Sejarah, Visi Misi, dan Profil lengkap Pemerintah Desa.')

@section('content')

    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[450px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=2813&auto=format&fit=crop"
                alt="Background Desa" class="w-full h-full object-cover opacity-50">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Tentang
                Kami</span>
            <h1
                class="text-4xl lg:text-6xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Profil & Identitas
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Mengenal lebih dalam sejarah, visi, dan potensi {{ $profile?->village_name ?? 'Desa' }}.
            </p>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI: KONTEN --}}
            <div class="lg:col-span-2 space-y-10 animate-fade-in-up animation-delay-400">

                {{-- Sejarah --}}
                <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-xl shadow-slate-200/50 border border-gray-100">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="text-3xl">📜</span>
                        <h2 class="text-2xl font-bold text-slate-900">Sejarah Desa</h2>
                    </div>
                    <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed text-justify">
                        @if ($profile?->history)
                            {!! nl2br(e($profile->history)) !!}
                        @else
                            <p class="italic text-slate-400 bg-slate-50 p-4 rounded-lg text-center">Data sejarah desa belum
                                ditambahkan.</p>
                        @endif
                    </div>
                </div>

                {{-- Visi Misi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div
                        class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
                        <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <span class="bg-white/20 p-1.5 rounded-lg">🎯</span> Visi
                        </h3>
                        <p class="text-lg font-medium leading-relaxed italic opacity-90">
                            "{{ $profile?->vision ?? 'Menjadi desa yang mandiri dan sejahtera.' }}"
                        </p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-lg border-t-4 border-emerald-500">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="bg-emerald-100 text-emerald-600 p-1.5 rounded-lg">🚀</span> Misi
                        </h3>
                        @if ($profile?->mission)
                            <div class="space-y-4">
                                @foreach (explode("\n", $profile->mission) as $misi)
                                    @if (trim($misi))
                                        <div class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <p class="text-slate-600 text-sm leading-relaxed">{{ $misi }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p class="text-slate-400 italic text-sm">Data misi belum diisi.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: SIDEBAR --}}
            <div class="lg:col-span-1 animate-fade-in-up animation-delay-400">
                <div class="sticky top-24 space-y-6">
                    <div
                        class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-gray-100 text-center relative overflow-hidden">
                        @if ($profile?->logo_path)
                            <img src="{{ asset('storage/' . $profile->logo_path) }}" loading="lazy"
                                class="w-28 h-28 mx-auto mb-6 drop-shadow-md bg-white rounded-full p-2">
                        @endif
                        <h3 class="font-bold text-xl text-slate-900">{{ $profile?->village_name ?? 'Desa Digital' }}</h3>
                        <p class="text-sm text-slate-500 font-medium uppercase tracking-wide mb-6">Kabupaten Tasikmalaya</p>

                        <div class="space-y-4 text-left bg-slate-50 p-5 rounded-2xl">
                            <div class="flex items-start gap-3">
                                <span class="text-lg">📍</span>
                                <span class="text-sm text-slate-600">{{ $profile?->address ?? '-' }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-lg">📧</span>
                                <span class="text-sm text-slate-600">{{ $profile?->email ?? '-' }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-lg">📞</span>
                                <span class="text-sm text-slate-600">{{ $profile?->phone ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
