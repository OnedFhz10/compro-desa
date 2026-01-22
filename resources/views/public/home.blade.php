@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- 1. HERO SECTION (MODERN) --}}
    <section class="relative bg-slate-900 min-h-[600px] flex items-center overflow-hidden">
        {{-- Background Image & Overlay --}}
        <div class="absolute inset-0 z-0">
            {{-- Jika ada foto desa, pakai foto itu. Jika tidak, pakai pattern gradient --}}
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/90 to-blue-900/50 z-10"></div>
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2832&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-60"> {{-- Placeholder Image Alam --}}
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 pt-10">
            <div class="max-w-3xl">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30 text-xs font-bold tracking-wider mb-6 backdrop-blur-sm">
                    WEBSITE RESMI PEMERINTAHAN
                </span>
                <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                    Selamat Datang di <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">
                        {{ $profile->village_name ?? 'Desa Digital' }}
                    </span>
                </h1>
                <p class="text-lg text-slate-300 mb-10 leading-relaxed max-w-xl">
                    Menuju desa mandiri yang transparan, inovatif, dan melayani masyarakat dengan sepenuh hati melalui
                    teknologi digital.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#berita"
                        class="bg-blue-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">
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

    {{-- 2. STATISTIK / LAYANAN (FLOATING CARDS) --}}
    <section class="relative z-30 -mt-20 mb-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pemerintahan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Transparansi anggaran dan struktur organisasi yang
                        akuntabel.</p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pelayanan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Pelayanan administrasi kependudukan yang cepat dan
                        mudah.</p>
                </div>
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Pemberdayaan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Mendukung UMKM dan potensi wisata lokal agar mendunia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 2.5. SAMBUTAN KEPALA DESA (BARU) --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="bg-blue-50 rounded-3xl p-8 lg:p-12 border border-blue-100 relative overflow-hidden">
                {{-- Decorative Quote Icon --}}
                <div class="absolute top-0 right-0 text-blue-200 transform translate-x-10 -translate-y-10">
                    <svg width="200" height="200" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.017 21L14.017 18C14.017 16.054 15.196 14.654 16.634 13.918C17.653 13.389 18.001 13.12 18.001 12.001L18.001 10.999L14.001 10.999L14.001 3.00098L22.001 3.00098L22.001 10.999C22.001 16.29 18.91 21 14.017 21ZM5.0166 21L5.0166 18C5.0166 16.054 6.1956 14.654 7.6346 13.918C8.6536 13.389 9.0016 13.12 9.0016 12.001L9.0016 10.999L5.0016 10.999L5.0016 3.00098L13.0016 3.00098L13.0016 10.999C13.0016 16.29 9.9106 21 5.0166 21Z">
                        </path>
                    </svg>
                </div>

                <div class="flex flex-col lg:flex-row items-center gap-10 relative z-10">

                    {{-- Foto Kepala Desa --}}
                    <div class="w-full lg:w-1/3 flex justify-center lg:justify-start">
                        <div class="relative w-64 h-72 lg:w-72 lg:h-80">
                            {{-- Frame accent --}}
                            <div
                                class="absolute inset-0 border-2 border-blue-600 rounded-3xl transform translate-x-4 translate-y-4">
                            </div>

                            {{-- Image Container --}}
                            <div class="absolute inset-0 bg-white rounded-3xl overflow-hidden shadow-xl">
                                @if ($kades && $kades->image_path)
                                    <img src="{{ asset('storage/' . $kades->image_path) }}" alt="{{ $kades->name }}"
                                        class="w-full h-full object-cover object-top">
                                @else
                                    <div
                                        class="w-full h-full bg-slate-200 flex items-center justify-center flex-col text-slate-400">
                                        <svg class="w-16 h-16 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        <span class="text-xs font-bold">Foto Belum Ada</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Name Tag Floating --}}
                            <div
                                class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-white/90 backdrop-blur border border-blue-100 px-6 py-2 rounded-full shadow-lg text-center w-max max-w-[90%]">
                                <h4 class="text-blue-900 font-bold text-sm">{{ $kades->name ?? 'Nama Kepala Desa' }}</h4>
                                <p class="text-xs text-blue-500 font-semibold uppercase tracking-wider">
                                    {{ $kades->position ?? 'Kepala Desa' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Teks Sambutan --}}
                    <div class="w-full lg:w-2/3 text-center lg:text-left">
                        <span class="text-blue-600 font-bold tracking-wider text-sm uppercase mb-2 block">Sambutan Kepala
                            Desa</span>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                            Bersinergi Membangun <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Desa Yang
                                Berkemajuan</span>
                        </h2>

                        <div class="prose prose-lg text-slate-600 leading-relaxed mb-8">
                            <p>
                                "Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi kami.
                                Website ini merupakan wujud komitmen kami dalam mewujudkan pemerintahan yang transparan,
                                akuntabel, dan inovatif."
                            </p>
                            <p class="mt-4 hidden lg:block">
                                "Melalui platform digital ini, kami berharap dapat mendekatkan pelayanan kepada masyarakat
                                serta memperkenalkan potensi desa kami ke jangkauan yang lebih luas. Mari bersama-sama kita
                                bangun desa yang mandiri, sejahtera, dan berdaya saing."
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Signature_sample.svg/1200px-Signature_sample.svg.png"
                                class="h-12 w-auto opacity-50 grayscale" alt="Tanda Tangan"> {{-- Dummy TTD --}}
                            <div class="text-left pl-4 border-l-2 border-slate-300">
                                <p class="text-slate-900 font-bold">{{ $kades->name ?? 'Nama Kepala Desa' }}</p>
                                <p class="text-slate-500 text-sm">Kepala Desa {{ $profile->village_name ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- 4. BERITA TERKINI (DENGAN BACKGROUND PATTERN) --}}
    <section class="py-20 bg-gray-50 relative">
        {{-- Dot Pattern Background --}}
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: radial-gradient(#444 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <span class="text-blue-600 font-bold tracking-wider text-sm uppercase">Informasi Desa</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2 mb-4">Kabar & Agenda Terbaru</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300 group flex flex-col h-full border border-gray-100">
                        <div class="relative h-60 overflow-hidden">
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-blue-700 text-xs font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase tracking-wide">
                                {{ $post->category->name }}
                            </span>
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 font-bold">
                                    No Image</div>
                            @endif

                            {{-- Date Badge Bottom Right --}}
                            <div
                                class="absolute bottom-0 right-0 bg-blue-600 text-white px-4 py-2 rounded-tl-xl text-xs font-bold">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition line-clamp-2">
                                <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                            <a href="{{ route('public.news.show', $post->slug) }}"
                                class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline mt-auto group-hover:translate-x-1 transition-transform">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <p class="text-slate-500 font-medium">Belum ada berita yang diterbitkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('public.news') }}"
                    class="inline-block border-2 border-slate-200 text-slate-600 px-8 py-3 rounded-full font-bold hover:border-blue-600 hover:bg-blue-600 hover:text-white transition">
                    Lihat Arsip Berita
                </a>
            </div>
        </div>
    </section>

    {{-- 5. POTENSI DESA (DARK SECTION) --}}
    @if ($potentials->count() > 0)
        <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
            {{-- Abstract background shapes --}}
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-blue-600 rounded-full blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500 rounded-full blur-[100px] opacity-10 -translate-x-1/3 translate-y-1/3">
            </div>

            <div class="container mx-auto px-4 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                    <div class="max-w-xl">
                        <span class="text-emerald-400 font-bold tracking-wider text-sm uppercase">Kekayaan Lokal</span>
                        <h2 class="text-3xl lg:text-5xl font-extrabold mt-3 leading-tight">Jelajahi Potensi & <br> Wisata
                            Desa</h2>
                    </div>
                    <div>
                        <a href="{{ route('public.potentials') }}"
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/10 hover:bg-emerald-500 text-white transition duration-300 backdrop-blur-sm border border-white/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($potentials as $item)
                        <div class="group relative h-96 rounded-3xl overflow-hidden cursor-pointer">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <div class="absolute inset-0 bg-slate-800 flex items-center justify-center">No Image</div>
                            @endif

                            {{-- Gradient Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition">
                            </div>

                            {{-- Text Content --}}
                            <div
                                class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-300 w-full">
                                <span
                                    class="bg-emerald-500 text-white text-[10px] font-bold px-3 py-1 rounded-full mb-3 inline-block">
                                    {{ $item->category }}
                                </span>
                                <h3 class="text-2xl font-bold text-white mb-2">{{ $item->title }}</h3>
                                <p
                                    class="text-slate-300 text-sm line-clamp-2 opacity-0 group-hover:opacity-100 transition delay-100">
                                    {{ Str::limit($item->description, 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 6. CALL TO ACTION (AJAKAN) --}}
    <section class="py-20 bg-blue-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-6">Punya Kritik, Saran, atau Pertanyaan?</h2>
            <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
                Kami sangat terbuka dengan masukan dari masyarakat demi kemajuan desa bersama. Silakan hubungi kami atau
                datang langsung ke kantor desa.
            </p>
            <div class="flex justify-center gap-4">
                <a href="https://wa.me/{{ $profile->phone ?? '' }}" target="_blank"
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
