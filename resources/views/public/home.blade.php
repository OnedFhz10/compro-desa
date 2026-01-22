@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- 1. HERO SECTION --}}
    <section class="relative bg-slate-900 min-h-[600px] flex items-center overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/90 to-blue-900/40 z-10"></div>
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2832&auto=format&fit=crop"
                alt="Desa View" class="w-full h-full object-cover opacity-60">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 pt-10 pb-32 lg:pb-10"> {{-- pb ditambah agar ada ruang untuk stats --}}
            <div class="max-w-3xl">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-xs font-bold tracking-wider mb-6 backdrop-blur-sm animate-fade-in-up">
                    WEBSITE RESMI PEMERINTAHAN
                </span>
                <h1
                    class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight animate-fade-in-up animation-delay-200">
                    Selamat Datang di <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">
                        {{ $profile?->village_name ?? 'Desa Digital' }}
                    </span>
                </h1>
                <p class="text-lg text-slate-300 mb-10 leading-relaxed max-w-xl animate-fade-in-up animation-delay-400">
                    Menuju desa mandiri yang transparan, inovatif, dan melayani masyarakat dengan sepenuh hati melalui
                    teknologi digital.
                </p>
                <div class="flex flex-wrap gap-4 animate-fade-in-up animation-delay-400">
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

    {{-- 2. STATISTIK FLOATING CARDS (Posisi Naik ke Atas Menumpuk Hero) --}}
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

    {{-- 3. WIDGET LACAK LAYANAN (Posisi Sekarang DI BAWAH STATISTIK) --}}
    <section class="mb-20 container mx-auto px-4 lg:px-8">
        {{-- Kita beri background tipis agar terlihat seperti area khusus --}}
        <div
            class="bg-blue-50/50 border border-blue-100 p-6 lg:p-8 rounded-[2.5rem] flex flex-col lg:flex-row items-center gap-6 animate-fade-in-up animation-delay-400">
            <div class="flex items-center gap-4 px-2 w-full lg:w-auto">
                <div
                    class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center flex-shrink-0 shadow-lg shadow-blue-600/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-800 text-xl">Lacak Surat</h4>
                    <p class="text-sm text-slate-500">Pantau status pengajuan surat anda secara realtime.</p>
                </div>
            </div>

            <form action="{{ route('public.layanan.status') }}" method="GET"
                class="flex-1 w-full flex flex-col sm:flex-row gap-3">
                <input type="text" name="kode" placeholder="Masukkan Kode Resi / NIK Anda..." required
                    class="w-full bg-white border border-slate-200 text-slate-700 text-base rounded-2xl px-6 py-4 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition shadow-sm">
                <button type="submit"
                    class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-10 py-4 rounded-2xl text-base transition shadow-lg whitespace-nowrap">
                    Cek Status
                </button>
            </form>
        </div>
    </section>

    {{-- 4. SAMBUTAN KEPALA DESA --}}
    <section class="py-20 bg-white border-y border-slate-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                {{-- Foto Kades (LAZY LOAD) --}}
                <div class="w-full lg:w-5/12 relative">
                    <div class="absolute inset-0 bg-blue-600 rounded-[3rem] transform rotate-3 opacity-10"></div>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white">
                        @if ($kades?->image_path)
                            <img src="{{ asset('storage/' . $kades->image_path) }}" alt="{{ $kades->name }}" loading="lazy"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        @else
                            <div class="w-full h-[400px] bg-slate-200 flex items-center justify-center text-slate-400">
                                Foto Belum Tersedia
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Teks --}}
                <div class="w-full lg:w-7/12">
                    <span class="text-blue-600 font-bold tracking-wider text-sm uppercase mb-2 block">Sambutan Kepala
                        Desa</span>
                    <h2 class="text-3xl lg:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                        Bersinergi Membangun <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Desa Yang
                            Berkemajuan</span>
                    </h2>
                    <div class="prose prose-lg text-slate-600 leading-relaxed mb-8">
                        <p>"Website ini merupakan wujud komitmen kami dalam mewujudkan pemerintahan yang transparan,
                            akuntabel, dan inovatif demi kesejahteraan masyarakat."</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-left pl-4 border-l-4 border-blue-600">
                            <p class="text-slate-900 font-bold text-xl">{{ $kades?->name ?? 'Nama Kepala Desa' }}</p>
                            <p class="text-slate-500">Kepala Desa {{ $profile?->village_name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. BERITA TERKINI --}}
    <section id="berita" class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <span class="text-blue-600 font-bold tracking-wider text-sm uppercase">Kabar Desa</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2">Informasi & Agenda Terbaru</h2>
                </div>
                <a href="{{ route('public.news') }}"
                    class="text-slate-600 font-bold hover:text-blue-600 transition flex items-center gap-2">
                    Lihat Arsip <span
                        class="bg-blue-100 text-blue-600 w-6 h-6 rounded-full flex items-center justify-center text-xs">&rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-lg shadow-slate-200/50 border border-gray-100 hover:-translate-y-2 transition duration-300 group flex flex-col h-full">
                        <div class="relative h-60 overflow-hidden bg-slate-200">
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-blue-700 text-xs font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase">
                                {{ $post->category?->name ?? 'Umum' }}
                            </span>
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold">No
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
                                class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition line-clamp-2">
                                <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                            <a href="{{ route('public.news.show', $post->slug) }}"
                                class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline mt-auto">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-400">Belum ada berita.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 6. POTENSI DESA --}}
    @if (isset($potentials) && $potentials->count() > 0)
        <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <span class="text-emerald-400 font-bold tracking-wider text-sm uppercase">Kekayaan Lokal</span>
                    <h2 class="text-3xl lg:text-5xl font-extrabold mt-3">Jelajahi Potensi Desa</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($potentials as $item)
                        <div class="group relative h-96 rounded-3xl overflow-hidden cursor-pointer">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" loading="lazy"
                                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <div class="absolute inset-0 bg-slate-800 flex items-center justify-center">No Image</div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-300 w-full">
                                <span
                                    class="bg-emerald-500 text-white text-[10px] font-bold px-3 py-1 rounded-full mb-3 inline-block">
                                    {{ $item->category }}
                                </span>
                                <h3 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 7. CALL TO ACTION --}}
    <section class="py-20 bg-blue-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-6">Butuh Layanan atau Bantuan?</h2>
            <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
                Silakan hubungi kami atau datang langsung ke kantor desa pada jam kerja.
            </p>
            <div class="flex justify-center gap-4">
                <a href="https://wa.me/{{ $profile?->phone ?? '' }}" target="_blank"
                    class="bg-white text-blue-600 px-8 py-3.5 rounded-full font-bold hover:bg-blue-50 transition shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.637 3.891 1.685 5.522l-1.117 4.08 4.004-1.096z" />
                    </svg>
                    Chat WhatsApp
                </a>
                <a href="{{ route('public.profile') }}"
                    class="bg-blue-700 text-white border border-blue-500 px-8 py-3.5 rounded-full font-bold hover:bg-blue-800 transition">
                    Kontak Kantor
                </a>
            </div>
        </div>
    </section>

@endsection
