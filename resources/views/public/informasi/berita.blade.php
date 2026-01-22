@extends('layouts.app')

@section('title', 'Kabar Desa')

@section('content')

    {{-- 1. HEADER SECTION (DENGAN BACKGROUND GAMBAR) --}}
    <div class="relative bg-slate-900 pt-24 pb-20 overflow-hidden">
        {{-- Background Image Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2940&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/20"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-xs font-bold tracking-widest mb-4 backdrop-blur-sm animate-fade-in-up">
                PUSAT INFORMASI PUBLIK
            </span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
                Kabar & Agenda Desa
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto leading-relaxed">
                Ikuti perkembangan terbaru pembangunan, kegiatan kemasyarakatan, dan informasi penting lainnya secara
                transparan.
            </p>
        </div>
    </div>

    {{-- 2. SECTION NAVIGASI KATEGORI (BARU) --}}
    <div class="bg-white border-b border-gray-100 sticky top-[80px] z-40 shadow-sm">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center gap-4 py-4 overflow-x-auto no-scrollbar">
                <span class="text-sm font-bold text-slate-800 whitespace-nowrap">Jelajahi Topik:</span>

                {{-- Tombol Kategori (Dummy Link) --}}
                <a href="#"
                    class="px-4 py-1.5 rounded-full bg-slate-900 text-white text-xs font-bold hover:bg-blue-600 transition flex-shrink-0">Semua</a>
                <a href="#"
                    class="px-4 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-bold hover:bg-blue-100 hover:text-blue-600 transition flex-shrink-0">Pemerintahan</a>
                <a href="#"
                    class="px-4 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-bold hover:bg-blue-100 hover:text-blue-600 transition flex-shrink-0">Pembangunan</a>
                <a href="#"
                    class="px-4 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-bold hover:bg-blue-100 hover:text-blue-600 transition flex-shrink-0">Ekonomi
                    Kreatif</a>
                <a href="#"
                    class="px-4 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-bold hover:bg-blue-100 hover:text-blue-600 transition flex-shrink-0">Sosial
                    & Budaya</a>
            </div>
        </div>
    </div>

    {{-- 3. CONTENT MAIN --}}
    <div class="bg-gray-50 py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- KOLOM KIRI: DAFTAR BERITA --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Search Bar --}}
                    <div
                        class="bg-white p-3 rounded-2xl shadow-sm border border-gray-200 flex items-center mb-8 focus-within:ring-2 ring-blue-500/20 transition">
                        <svg class="w-5 h-5 text-slate-400 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Cari berita atau kegiatan..."
                            class="flex-grow px-4 py-2 bg-transparent outline-none text-slate-600 placeholder-slate-400">
                        <button
                            class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-600 transition text-sm">
                            Cari
                        </button>
                    </div>

                    @forelse($posts as $post)
                        <div
                            class="bg-white rounded-3xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 border border-gray-100 flex flex-col md:flex-row gap-6 group">
                            {{-- Thumbnail Image --}}
                            <div class="w-full md:w-1/3 h-52 md:h-auto rounded-2xl overflow-hidden relative flex-shrink-0">
                                <span
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur text-blue-700 text-[10px] font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase tracking-wide">
                                    {{ $post->category->name }}
                                </span>
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 font-bold">
                                        No Image</div>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="flex-grow flex flex-col justify-center">
                                <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $post->created_at->format('d F Y') }}
                                </div>
                                <h2
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition">
                                    <a href="{{ route('public.news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                                <a href="{{ route('public.news.show', $post->slug) }}"
                                    class="text-blue-600 font-bold text-sm hover:underline flex items-center gap-1 group/btn">
                                    Baca Selengkapnya <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-gray-300">
                            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                            <p class="text-slate-500">Belum ada berita yang diterbitkan.</p>
                        </div>
                    @endforelse

                    {{-- Pagination --}}
                    <div class="mt-10">
                        {{ $posts->links() }}
                    </div>
                </div>

                {{-- KOLOM KANAN: SIDEBAR --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-28 space-y-8">

                        {{-- 4. WIDGET AGENDA KEGIATAN (BARU) --}}
                        <div class="bg-white rounded-3xl p-6 shadow-lg shadow-slate-200/50 border border-gray-100">
                            <h3
                                class="font-bold text-lg text-slate-800 mb-6 pb-4 border-b border-gray-100 flex items-center gap-2">
                                <span class="bg-orange-100 text-orange-600 p-1.5 rounded-lg">📅</span> Agenda Kegiatan
                            </h3>

                            <div class="space-y-4">
                                {{-- Item Agenda 1 (Statis) --}}
                                <div class="flex gap-4 items-start group">
                                    <div
                                        class="bg-blue-50 text-blue-700 rounded-xl px-3 py-2 text-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition">
                                        <span class="block text-xs font-bold uppercase">Jun</span>
                                        <span class="block text-xl font-extrabold">12</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 text-sm leading-tight group-hover:text-blue-600 transition">
                                            Musyawarah Desa (Musdes)</h4>
                                        <span class="text-xs text-slate-400 mt-1 block">📍 Balai Desa • 09:00 WIB</span>
                                    </div>
                                </div>
                                {{-- Item Agenda 2 --}}
                                <div class="flex gap-4 items-start group">
                                    <div
                                        class="bg-blue-50 text-blue-700 rounded-xl px-3 py-2 text-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition">
                                        <span class="block text-xs font-bold uppercase">Jun</span>
                                        <span class="block text-xl font-extrabold">15</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 text-sm leading-tight group-hover:text-blue-600 transition">
                                            Posyandu Balita RW 02</h4>
                                        <span class="text-xs text-slate-400 mt-1 block">📍 Posyandu Mawar • 08:00 WIB</span>
                                    </div>
                                </div>
                                {{-- Item Agenda 3 --}}
                                <div class="flex gap-4 items-start group">
                                    <div
                                        class="bg-blue-50 text-blue-700 rounded-xl px-3 py-2 text-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition">
                                        <span class="block text-xs font-bold uppercase">Jun</span>
                                        <span class="block text-xl font-extrabold">20</span>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-800 text-sm leading-tight group-hover:text-blue-600 transition">
                                            Kerja Bakti Lingkungan</h4>
                                        <span class="text-xs text-slate-400 mt-1 block">📍 Lingkungan RW 01 • 07:00
                                            WIB</span>
                                    </div>
                                </div>
                            </div>

                            <a href="#"
                                class="block text-center text-sm font-bold text-blue-600 mt-6 hover:underline">Lihat Semua
                                Agenda &rarr;</a>
                        </div>

                        {{-- WIDGET LAYANAN --}}
                        <div
                            class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-6 shadow-lg text-white relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-4 opacity-10">
                                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2 relative z-10">Butuh Surat Pengantar?</h3>
                            <p class="text-blue-100 text-sm mb-6 relative z-10">Cek persyaratan pembuatan KTP, KK, dan Akta
                                Kelahiran secara online.</p>
                            <a href="#"
                                class="inline-block w-full bg-white text-blue-700 font-bold py-3 rounded-xl text-center hover:bg-blue-50 transition shadow-md relative z-10">
                                Cek Persyaratan
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
