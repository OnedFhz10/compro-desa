@extends('layouts.app')

@section('title', 'Profil Desa')
@section('meta_description', $profile->meta_description ?? 'Profil lengkap, sejarah, visi misi, dan informasi desa.')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        {{-- Background Image (Optimized) --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=60&w=1200&auto=format&fit=crop"
                alt="Background Desa" class="w-full h-full object-cover opacity-50" width="1200" height="400" loading="eager">
        </div>

        <div class="container mx-auto px-4 relative z-20 text-center pt-10 animate-fade-in-up">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-2 tracking-tight">Profil & Identitas</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto font-light">
                Mengenal lebih dalam {{ $profile?->village_name ?? 'Desa Kami' }}.
            </p>
        </div>
    </section>

    {{-- BREADCRUMB --}}
    <div class="bg-slate-50 border-b border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-900 font-medium">Profil Desa</span>
            </nav>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="container mx-auto px-4 lg:px-8 py-12 relative z-30">
        
        {{-- Statistics Cards (Optimized Icons & Layout) --}}
        @if($profile && ($profile->population || $profile->area_size || $profile->rt_count || $profile->rw_count))
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                @if($profile->population)
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 text-white rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold tracking-tight">{{ $profile->formatted_population }}</p>
                        <p class="text-sm opacity-90 mt-1 font-medium">Penduduk</p>
                    </div>
                @endif

                @if($profile->area_size)
                    <div class="bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold tracking-tight">{{ $profile->formatted_area }}</p>
                        <p class="text-sm opacity-90 mt-1 font-medium">Km² Luas</p>
                    </div>
                @endif

                @if($profile->rt_count)
                    <div class="bg-gradient-to-br from-amber-600 to-amber-700 text-white rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold tracking-tight">{{ $profile->rt_count }}</p>
                        <p class="text-sm opacity-90 mt-1 font-medium">Rukun Tetangga</p>
                    </div>
                @endif

                @if($profile->rw_count)
                    <div class="bg-gradient-to-br from-purple-600 to-purple-700 text-white rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold tracking-tight">{{ $profile->rw_count }}</p>
                        <p class="text-sm opacity-90 mt-1 font-medium">Rukun Warga</p>
                    </div>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KONTEN UTAMA (Kiri) --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Sejarah --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6 border-b pb-4 flex items-center gap-3">
                        <span class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </span>
                        Sejarah Desa
                    </h2>
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-justify">
                        @if ($profile?->history)
                            {!! nl2br(e($profile->history)) !!}
                        @else
                            <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 text-center text-slate-500 italic">
                                Data sejarah belum ditambahkan oleh admin.
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Visi --}}
                    <div class="bg-gradient-to-br from-blue-900 to-slate-900 text-white rounded-2xl p-8 shadow-lg relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-2xl transform translate-x-10 -translate-y-10 group-hover:bg-white/10 transition duration-700"></div>
                        <h3 class="text-xl font-bold mb-6 border-b border-blue-700/50 pb-4 flex items-center gap-2 relative z-10">
                            <span class="text-blue-400">🎯</span> Visi Utama
                        </h3>
                        <p class="text-lg font-medium leading-relaxed opacity-95 relative z-10 italic">
                            "{{ $profile?->vision ?? 'Belum ada visi.' }}"
                        </p>
                    </div>

                    {{-- Misi --}}
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold mb-6 text-slate-900 pb-4 border-b border-slate-100 flex items-center gap-2">
                             <span class="text-emerald-500">✅</span> Misi Strategis
                        </h3>
                        @if ($profile?->mission)
                            <ul class="space-y-4">
                                @foreach (explode("\n", $profile->mission) as $index => $misi)
                                    @if (trim($misi))
                                        <li class="flex items-start gap-4 text-slate-600 group">
                                            <span class="flex-shrink-0 w-8 h-8 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-lg flex items-center justify-center text-sm font-bold group-hover:bg-emerald-500 group-hover:text-white transition duration-300">
                                                {{ $index + 1 }}
                                            </span>
                                            <span class="flex-1 text-sm leading-relaxed pt-1.5 font-medium">{{ $misi }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-slate-400 italic text-center py-4">Belum ada misi.</p>
                        @endif
                    </div>
                </div>

                {{-- Google Maps Section --}}
                @if($profile && $profile->latitude && $profile->longitude)
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 border-b pb-4 flex items-center gap-3">
                            <span class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            Lokasi & Peta
                        </h2>
                        <div class="w-full h-[400px] rounded-xl overflow-hidden border border-gray-200 bg-slate-100 relative group">
                            <iframe
                                title="Peta Lokasi Desa"
                                src="https://maps.google.com/maps?q={{ $profile->latitude }},{{ $profile->longitude }}&z=15&output=embed"
                                class="w-full h-full border-0 grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition duration-700"
                                loading="lazy"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="https://www.google.com/maps?q={{ $profile->latitude }},{{ $profile->longitude }}" 
                                target="_blank"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-600/20 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- SIDEBAR (Kanan) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    
                    {{-- Info Card --}}
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
                        
                        {{-- Logo Desa --}}
                        <div class="mb-6 relative inline-block">
                             @if ($profile?->logo_path)
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo {{ $profile->village_name }}"
                                    class="w-32 h-32 mx-auto object-contain hover:scale-105 transition duration-300 drop-shadow-xl">
                            @else
                                <div class="w-32 h-32 mx-auto bg-slate-50 rounded-full flex items-center justify-center text-slate-300 border-2 border-slate-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <h3 class="font-bold text-2xl text-slate-800 mb-1 tracking-tight">{{ $profile?->village_name }}</h3>
                        <p class="text-xs text-blue-500 font-bold uppercase tracking-widest mb-8">Pemerintah Desa</p>

                        {{-- Contact Info --}}
                        <div class="text-left space-y-5 text-sm text-slate-600 border-t border-slate-100 pt-6">
                            @if($profile?->full_address)
                                <div class="flex gap-4 group">
                                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <div>
                                        <strong class="block text-xs text-slate-400 uppercase tracking-wider mb-1">Alamat Kantor</strong>
                                        <span class="font-medium text-slate-700 leading-snug block">{{ $profile->full_address }}</span>
                                    </div>
                                </div>
                            @endif

                            @if($profile?->email)
                                <div class="flex gap-4 group">
                                     <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 group-hover:bg-red-600 group-hover:text-white transition duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <strong class="block text-xs text-slate-400 uppercase tracking-wider mb-1">Email Resmi</strong>
                                        <a href="mailto:{{ $profile->email }}" class="font-medium text-slate-700 hover:text-blue-600 transition truncate block">{{ $profile->email }}</a>
                                    </div>
                                </div>
                            @endif

                            @if($profile?->phone)
                                <div class="flex gap-4 group">
                                     <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center flex-shrink-0 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <div>
                                        <strong class="block text-xs text-slate-400 uppercase tracking-wider mb-1">Telepon / WhatsApp</strong>
                                        <a href="tel:{{ $profile->phone }}" class="font-medium text-slate-700 hover:text-blue-600 transition">{{ $profile->phone }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Social Share --}}
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                        <h4 class="text-sm font-bold text-slate-700 mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-slate-400 rounded-full"></span> Bagikan Profil
                        </h4>
                        <div class="grid grid-cols-3 gap-2">
                             <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
                                class="flex flex-col items-center justify-center gap-1 bg-white border border-slate-200 hover:border-blue-500 hover:text-blue-600 p-3 rounded-xl transition group">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
                                <span class="text-[10px] font-bold">Facebook</span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Profil ' . ($profile?->village_name ?? 'Desa')) }}" target="_blank"
                                class="flex flex-col items-center justify-center gap-1 bg-white border border-slate-200 hover:border-sky-500 hover:text-sky-500 p-3 rounded-xl transition group">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>
                                <span class="text-[10px] font-bold">Twitter</span>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode('Lihat profil ' . ($profile?->village_name ?? 'desa') . ': ' . request()->fullUrl()) }}" target="_blank"
                                class="flex flex-col items-center justify-center gap-1 bg-white border border-slate-200 hover:border-green-500 hover:text-green-600 p-3 rounded-xl transition group">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.89 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                <span class="text-[10px] font-bold">WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
