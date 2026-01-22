@extends('layouts.app')

@section('title', 'Profil Desa')

@section('content')

    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=2813&auto=format&fit=crop"
                alt="Background Desa" class="w-full h-full object-cover opacity-50">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Tentang
                Kami</span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                Profil & Identitas
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Mengenal lebih dalam sejarah, visi, dan potensi {{ $profile->village_name ?? 'Desa' }}.
            </p>
        </div>
    </section>

    {{-- MAIN CONTAINER (Floating Layout) --}}
    <div class="container mx-auto px-4 lg:px-8 pb-12 relative z-30 -mt-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI: KONTEN TEKS --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- A. SEJARAH DESA --}}
                <div
                    class="bg-white rounded-3xl p-8 lg:p-12 shadow-xl shadow-slate-200/50 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-8 -mt-8 z-0"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-3xl">📜</span>
                            <h2 class="text-2xl font-bold text-slate-900">Sejarah Desa</h2>
                        </div>
                        <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed text-justify">
                            @if ($profile->history)
                                {!! nl2br(e($profile->history)) !!}
                            @else
                                <p class="italic text-slate-400 bg-slate-50 p-4 rounded-lg text-center">Data sejarah desa
                                    belum ditambahkan.</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- B. VISI & MISI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Visi --}}
                    <div
                        class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <span class="bg-white/20 p-1.5 rounded-lg">🎯</span> Visi
                        </h3>
                        <p class="text-lg font-medium leading-relaxed italic opacity-90">
                            "{{ $profile->vision ?? 'Menjadi desa yang mandiri dan sejahtera.' }}"
                        </p>
                    </div>

                    {{-- Misi --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg border-t-4 border-emerald-500">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="bg-emerald-100 text-emerald-600 p-1.5 rounded-lg">🚀</span> Misi
                        </h3>
                        @if ($profile->mission)
                            <div class="space-y-4">
                                @foreach (explode("\n", $profile->mission) as $misi)
                                    @if (trim($misi))
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0 mt-0.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
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

            {{-- KOLOM KANAN: SIDEBAR (IDENTITAS) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <div
                        class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-gray-100 text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-blue-50 to-transparent"></div>
                        <div class="relative z-10">
                            @if ($profile->logo_path)
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo"
                                    class="w-28 h-28 mx-auto mb-6 drop-shadow-md bg-white rounded-full p-2">
                            @endif
                            <h3 class="font-bold text-xl text-slate-900">{{ $profile->village_name }}</h3>
                            <p class="text-sm text-slate-500 font-medium uppercase tracking-wide mb-6">Kabupaten Tasikmalaya
                            </p>
                            <div class="space-y-4 text-left bg-slate-50 p-5 rounded-2xl">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm text-slate-600">{{ $profile->address ?? '-' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-sm text-slate-600">{{ $profile->email ?? '-' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    <span class="text-sm text-slate-600">{{ $profile->phone ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- C. GEOGRAFIS & DEMOGRAFI (MODERN SPLIT LAYOUT) --}}
    <section class="py-20 relative overflow-hidden rounded-3xl my-12 mx-4 lg:mx-8">
        {{-- Background Gelap & Pattern --}}
        <div class="absolute inset-0 bg-slate-900 z-0">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[120px] opacity-20 -translate-y-1/2 translate-x-1/3">
            </div>
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">

                {{-- Kiri: Teks Geografis --}}
                <div class="w-full lg:w-1/2 text-white">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 border border-blue-500/30 text-blue-300 text-xs font-bold uppercase tracking-widest mb-6">
                        <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                        Bentang Alam
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold mb-6 leading-tight">
                        Kondisi Geografis & <br> <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Lingkungan
                            Desa</span>
                    </h2>
                    <p class="text-slate-300 text-lg leading-relaxed mb-8">
                        Terletak di dataran strategis Kabupaten Tasikmalaya, Desa {{ $profile->village_name }} memiliki
                        kontur wilayah perbukitan asri dengan suhu rata-rata 24°C. Wilayah ini dialiri sungai yang subur,
                        menjadikannya sentra pertanian yang produktif.
                    </p>

                    {{-- Batas Wilayah (List Modern) --}}
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm">
                        <h4 class="font-bold text-white mb-4 border-b border-white/10 pb-2">Batas Wilayah Administratif
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-slate-300">
                            <li class="flex items-center gap-3">
                                <span
                                    class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">⬆️</span>
                                <div><span class="block text-xs text-slate-500 uppercase">Utara</span> Desa Cimahi</div>
                            </li>
                            <li class="flex items-center gap-3">
                                <span
                                    class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">⬇️</span>
                                <div><span class="block text-xs text-slate-500 uppercase">Selatan</span> Kec. Singaparna
                                </div>
                            </li>
                            <li class="flex items-center gap-3">
                                <span
                                    class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">⬅️</span>
                                <div><span class="block text-xs text-slate-500 uppercase">Barat</span> Sungai Citanduy
                                </div>
                            </li>
                            <li class="flex items-center gap-3">
                                <span
                                    class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">➡️</span>
                                <div><span class="block text-xs text-slate-500 uppercase">Timur</span> Desa Sukamaju</div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Kanan: Demografi (Dashboard Style) --}}
                <div class="w-full lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        {{-- Card Stats 1 --}}
                        <div
                            class="bg-white text-slate-900 p-6 rounded-3xl shadow-xl transform hover:-translate-y-2 transition duration-300">
                            <div class="text-blue-600 mb-2">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-3xl font-extrabold mb-1">1.250</div>
                            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jiwa Penduduk</div>
                        </div>
                        {{-- Card Stats 2 --}}
                        <div
                            class="bg-emerald-50 text-emerald-900 p-6 rounded-3xl shadow-xl transform translate-y-8 hover:translate-y-6 transition duration-300">
                            <div class="text-emerald-600 mb-2">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-3xl font-extrabold mb-1">340</div>
                            <div class="text-xs font-bold text-emerald-600/70 uppercase tracking-wider">Kepala Keluarga
                            </div>
                        </div>
                        {{-- Card Stats 3 --}}
                        <div
                            class="bg-orange-50 text-orange-900 p-6 rounded-3xl shadow-xl transform hover:-translate-y-2 transition duration-300">
                            <div class="text-orange-600 mb-2">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-1.447-.894L15 7m0 13V7">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-3xl font-extrabold mb-1">5.4</div>
                            <div class="text-xs font-bold text-orange-600/70 uppercase tracking-wider">Luas Hektar</div>
                        </div>
                        {{-- Card Stats 4 --}}
                        <div
                            class="bg-purple-50 text-purple-900 p-6 rounded-3xl shadow-xl transform translate-y-8 hover:translate-y-6 transition duration-300">
                            <div class="text-purple-600 mb-2">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-3xl font-extrabold mb-1">4/12</div>
                            <div class="text-xs font-bold text-purple-600/70 uppercase tracking-wider">Dusun / RT</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- D. PETA WILAYAH (FLOATING CARD STYLE) --}}
    <section class="py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div
                class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200 overflow-hidden relative h-[500px] border border-gray-100 group">

                {{-- Map Iframe --}}
                <iframe
                    src="https://maps.google.com/maps?q={{ urlencode($profile->village_name . ' Tasikmalaya') }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    class="filter grayscale group-hover:grayscale-0 transition duration-700">
                </iframe>

                {{-- Overlay Info Card --}}
                <div
                    class="absolute top-8 left-8 bg-white/95 backdrop-blur-md p-6 rounded-2xl shadow-lg max-w-xs border border-gray-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Lokasi Kantor Desa</h4>
                            <span class="text-xs text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded-full">Buka
                                Sekarang</span>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                        {{ $profile->address ?? 'Alamat belum diatur' }}</p>
                    <a href="https://maps.google.com/?q={{ $profile->village_name }}" target="_blank"
                        class="block w-full bg-blue-600 text-white text-center py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Petunjuk Arah →
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- E. POTENSI DESA RINGKAS (HORIZONTAL SCROLL / GRID) --}}
    @if (isset($potentials) && $potentials->count() > 0)
        <section class="py-20 bg-slate-50 relative">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                    <div>
                        <span class="text-emerald-600 font-bold tracking-widest text-sm uppercase mb-2 block">Produk &
                            Wisata</span>
                        <h2 class="text-3xl font-extrabold text-slate-900">Potensi Unggulan Desa</h2>
                    </div>
                    <a href="{{ route('public.potentials') }}"
                        class="group flex items-center gap-2 text-slate-600 font-bold hover:text-emerald-600 transition">
                        Lihat Selengkapnya
                        <span
                            class="bg-emerald-100 text-emerald-600 w-8 h-8 rounded-full flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition">→</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($potentials as $item)
                        <a href="{{ route('public.potentials') }}"
                            class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 border border-gray-100 flex flex-col h-full">
                            {{-- Image --}}
                            <div class="relative h-56 overflow-hidden">
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                @else
                                    <div
                                        class="w-full h-full bg-slate-200 flex items-center justify-center font-bold text-slate-400">
                                        No Image</div>
                                @endif
                                {{-- Category Badge --}}
                                <div
                                    class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-emerald-700 uppercase tracking-wide shadow-sm">
                                    {{ $item->category }}
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-emerald-600 transition">
                                    {{ $item->title }}</h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-grow">
                                    {{ Str::limit($item->description, 80) }}</p>
                                <div class="flex items-center text-emerald-600 text-sm font-bold mt-auto">
                                    Baca Detail
                                    <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
