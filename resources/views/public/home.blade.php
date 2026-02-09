@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- 1. HERO SECTION --}}
    <section class="relative bg-slate-900 min-h-[600px] flex items-center overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/90 to-blue-900/40 z-10"></div>
            {{-- OPTIMIZATION: w=1200 (resize), q=60 (compress), loading="eager" (LCP priority) --}}
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=60&w=1200&auto=format&fit=crop"
                alt="Desa View" class="w-full h-full object-cover opacity-60" width="1200" height="800" loading="eager">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 pt-10 pb-32 lg:pb-10">
            <div class="max-w-3xl">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-xs font-bold tracking-wider mb-6 backdrop-blur-sm">
                    WEBSITE RESMI PEMERINTAHAN
                </span>
                {{-- OPTIMIZATION: Removed animation-delay for immediate rendering --}}
                <h1
                    class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight animate-fade-in-up">
                    Selamat Datang di <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">
                        {{ $profile?->village_name ?? 'Desa Digital' }}
                    </span>
                </h1>
                <p class="text-lg text-slate-300 mb-10 leading-relaxed max-w-xl animate-fade-in-up">
                    Menuju desa mandiri yang transparan, inovatif, dan melayani masyarakat dengan sepenuh hati melalui
                    teknologi digital.
                </p>
                <div class="flex flex-wrap gap-4 animate-fade-in-up">
                    <a href="#berita"
                        class="bg-blue-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-600/30 transform hover:-translate-y-1">
                        Jelajahi Berita
                    </a>
                    <a href="{{ route('public.profile') }}"
                        class="bg-white/10 text-white border border-white/20 px-8 py-3.5 rounded-full font-bold hover:bg-white/20 transition backdrop-blur-sm">
                        Profil Desa
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. STATISTIK FLOATING CARDS --}}
    <section class="relative z-30 -mt-20 lg:-mt-24 mb-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card 1 --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-900/10 border border-gray-100 hover:-translate-y-2 transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pemerintahan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Struktur organisasi yang transparan dan akuntabel.</p>
                </div>
                {{-- Card 2 --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-900/10 border border-gray-100 hover:-translate-y-2 transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pelayanan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Layanan administrasi cepat, mudah, dan gratis.</p>
                </div>
                {{-- Card 3 --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-900/10 border border-gray-100 hover:-translate-y-2 transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-6 group-hover:bg-orange-600 group-hover:text-white transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pemberdayaan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Mendukung UMKM dan potensi wisata lokal.</p>
                </div>
            </div>
        </div>
    </section>



    {{-- 4. SAMBUTAN KEPALA DESA --}}
    {{-- 4. SAMBUTAN KEPALA DESA --}}
    <section class="py-24 relative bg-gradient-to-b from-white via-blue-50 to-blue-100 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
             <svg class="w-full h-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="dot-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="2" height="2" class="text-blue-900" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#dot-pattern)" />
            </svg>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                {{-- Foto Kades --}}
                <div class="w-full lg:w-5/12 relative group">
                    <div class="absolute inset-0 bg-blue-600 rounded-[3rem] transform rotate-3 opacity-20 group-hover:rotate-6 transition duration-500"></div>
                    <div class="absolute inset-0 bg-slate-900 rounded-[3rem] transform -rotate-2 opacity-5 scale-95"></div>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white transform transition duration-500 group-hover:-translate-y-2">
                        @if ($kades?->image_path)
                            <img src="{{ asset('storage/' . $kades->image_path) }}" alt="{{ $kades->name }}" loading="lazy"
                                class="w-full h-auto object-cover">
                        @else
                            <div class="w-full h-[400px] bg-slate-200 flex items-center justify-center text-slate-400">
                                Foto Belum Tersedia
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Teks --}}
                <div class="w-full lg:w-7/12">
                    <span class="inline-block py-1 px-3 rounded-lg bg-blue-100/50 text-blue-600 font-bold tracking-wider text-sm uppercase mb-4 shadow-sm">
                        Sambutan Kepala Desa
                    </span>
                    <h2 class="text-3xl lg:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                        Bersinergi Membangun <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
                            Desa Yang Berkemajuan
                        </span>
                    </h2>
                    <div class="prose prose-lg text-slate-600 leading-relaxed mb-8">
                        <p class="italic relative pl-6 border-l-4 border-blue-400 bg-white/50 p-4 rounded-r-xl">
                            "Website ini merupakan wujud komitmen kami dalam mewujudkan pemerintahan yang transparan,
                            akuntabel, dan inovatif demi kesejahteraan masyarakat."
                        </p>
                    </div>
                    <div class="flex items-center gap-5 pt-4 border-t border-blue-100/50">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-slate-900 font-bold text-xl leading-none mb-1">{{ $kades?->name ?? 'Nama Kepala Desa' }}</p>
                            <p class="text-slate-500 text-sm">Kepala Desa {{ $profile?->village_name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wave Divider --}}
        <div class="absolute bottom-0 left-0 right-0 z-20 pointer-events-none translate-y-1">
             <svg class="fill-slate-50 w-full h-16 sm:h-24 lg:h-32" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    {{-- 5. BERITA TERKINI --}}
    <section id="berita" class="py-24 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-900/20 pointer-events-none"></div>
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <span class="text-blue-400 font-bold tracking-wider text-sm uppercase">Kabar Desa</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-white mt-2">Informasi & Agenda Terbaru</h2>
                </div>
                <a href="{{ route('public.news.index') }}"
                    class="text-slate-300 font-bold hover:text-white transition flex items-center gap-2">
                    Lihat Arsip <span
                        class="bg-blue-500/20 text-blue-300 w-6 h-6 rounded-full flex items-center justify-center text-xs border border-blue-500/30">&rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <div
                        class="bg-slate-800 rounded-3xl overflow-hidden shadow-xl shadow-black/20 border border-slate-700 hover:-translate-y-2 transition duration-300 group flex flex-col h-full">
                        <div class="relative h-60 overflow-hidden bg-slate-700">
                            <span
                                class="absolute top-4 left-4 bg-slate-900/80 backdrop-blur text-blue-300 text-xs font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase border border-slate-600">
                                {{ $post->category?->name ?? 'Umum' }}
                            </span>
                            {{-- PERBAIKAN: Gunakan $post->image (sesuai controller Post) --}}
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-500 font-bold">No
                                    Image</div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                            <h3
                                class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-blue-400 transition line-clamp-2">
                                <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-400 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                            <a href="{{ route('public.news.show', $post->slug) }}"
                                class="inline-flex items-center text-blue-400 font-bold text-sm hover:underline mt-auto">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">Belum ada berita.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 6. POTENSI DESA --}}
    {{-- 6. POTENSI DESA --}}
    @if (isset($potentials) && $potentials->count() > 0)
        <section class="py-24 bg-white relative overflow-hidden border-t border-slate-100">
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                    <div>
                        <span class="text-blue-600 font-bold tracking-wider text-sm uppercase">Kekayaan Lokal</span>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2">Jelajahi Potensi Desa</h2>
                    </div>
                    <a href="{{ route('public.potentials.index') }}"
                        class="text-slate-600 font-bold hover:text-blue-600 transition flex items-center gap-2">
                        Lihat Semua <span
                            class="bg-blue-100 text-blue-600 w-6 h-6 rounded-full flex items-center justify-center text-xs border border-blue-200">&rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($potentials as $item)
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-slate-200/60 border border-slate-100 hover:-translate-y-2 transition duration-300 group flex flex-col h-full">
                            <div class="relative h-60 overflow-hidden bg-slate-100">
                                <span
                                    class="absolute top-4 left-4 bg-white/90 backdrop-blur text-blue-600 text-xs font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase border border-slate-200">
                                    {{ $item->category }}
                                </span>
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" loading="lazy"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold">No Image</div>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ Str::limit($item->address ?? 'Lokasi tidak tersedia', 30) }}
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition line-clamp-2">
                                    <a href="{{ route('public.potentials.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                    {{ Str::limit(strip_tags($item->description), 100) }}
                                </p>
                                <a href="{{ route('public.potentials.show', $item->slug) }}"
                                    class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline mt-auto">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



@endsection
