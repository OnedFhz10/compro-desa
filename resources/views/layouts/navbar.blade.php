@php
    $navProfile = \App\Models\VillageProfile::first();
@endphp

<nav class="glass-nav fixed w-full z-50 top-0 transition-all duration-300" id="navbar">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- 1. LOGO AREA (KIRI) --}}
            {{-- Wajib diberi width tetap (lg:w-[280px]) agar seimbang dengan sisi kanan --}}
            <div class="flex-shrink-0 flex items-center lg:w-[280px]">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    @if ($navProfile?->logo_path)
                        <img src="{{ asset('storage/' . $navProfile->logo_path) }}" alt="Logo"
                            class="h-10 w-10 object-contain group-hover:scale-110 transition duration-300 drop-shadow-sm">
                    @endif
                    <div class="flex flex-col">
                        <span
                            class="text-lg font-extrabold text-slate-900 leading-none group-hover:text-blue-700 transition hidden sm:block tracking-tight">
                            {{ $navProfile?->village_name ?? 'Desa Digital' }}
                        </span>
                        <span
                            class="text-[10px] font-bold tracking-[0.2em] text-slate-500 uppercase hidden sm:block mt-0.5">
                            Kab. Tasikmalaya
                        </span>
                    </div>
                </a>
            </div>

            {{-- 2. MENU DESKTOP (TENGAH - PERFECT CENTER) --}}
            <div class="hidden lg:flex flex-1 justify-center items-center">
                {{-- Style Menu Bersih (Tanpa Background Abu) --}}
                <div class="flex items-center gap-6">

                    {{-- Beranda --}}
                    <a href="{{ route('home') }}"
                        class="text-sm font-bold transition-all relative group py-2 {{ request()->routeIs('home') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                        Beranda
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                    </a>

                    {{-- Profil --}}
                    <a href="{{ route('public.profile') }}"
                        class="text-sm font-bold transition-all relative group py-2 {{ request()->routeIs('public.profile') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                        Profil
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('public.profile') ? 'scale-x-100' : '' }}"></span>
                    </a>

                    {{-- Dropdown Pemerintahan --}}
                    <div class="relative group py-2">
                        <button
                            class="flex items-center gap-1 text-sm font-bold text-slate-600 hover:text-blue-600 focus:outline-none">
                            Pemerintahan <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                            <a href="{{ route('public.structure') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Struktur
                                Organisasi</a>
                            <a href="{{ route('public.officials') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Perangkat
                                Desa</a>
                            <a href="{{ route('public.institutions') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Lembaga
                                Desa</a>
                            <a href="{{ route('public.rtrw') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Data
                                RT / RW</a>
                        </div>
                    </div>

                    {{-- Dropdown Transparansi --}}
                    <div class="relative group py-2">
                        <button
                            class="flex items-center gap-1 text-sm font-bold text-slate-600 hover:text-blue-600 focus:outline-none">
                            Transparansi <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                            <a href="{{ route('public.transparency.apbdes') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Laporan
                                APBDes</a>
                            <a href="{{ route('public.transparency.realisasi') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Realisasi
                                Anggaran</a>
                            <a href="{{ route('public.transparency.laporan') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Laporan
                                Kegiatan</a>
                        </div>
                    </div>

                    {{-- Dropdown Potensi --}}
                    <div class="relative group py-2">
                        <button
                            class="flex items-center gap-1 text-sm font-bold text-slate-600 hover:text-blue-600 focus:outline-none">
                            Potensi <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                            <a href="{{ route('public.potentials') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium transition">Semua
                                Potensi</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ route('public.potentials.category', 'wisata') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium transition">Wisata</a>
                            <a href="{{ route('public.potentials.category', 'umkm') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium transition">UMKM</a>
                            <a href="{{ route('public.potentials.category', 'produk') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium transition">Produk
                                Unggulan</a>
                        </div>
                    </div>

                    {{-- Dropdown Informasi --}}
                    <div class="relative group py-2">
                        <button
                            class="flex items-center gap-1 text-sm font-bold text-slate-600 hover:text-blue-600 focus:outline-none">
                            Informasi <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                            <a href="{{ route('public.news') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Berita
                                Desa</a>
                            <a href="{{ route('public.announcements') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Pengumuman</a>
                            <a href="{{ route('public.agenda') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Agenda
                                Kegiatan</a>
                            <a href="{{ route('public.gallery') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Galeri
                                Foto</a>
                        </div>
                    </div>

                    {{-- Dropdown Layanan --}}
                    <div class="relative group py-2">
                        <button
                            class="flex items-center gap-1 text-sm font-bold text-slate-600 hover:text-blue-600 focus:outline-none">
                            Layanan <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                            <a href="{{ route('public.layanan.surat') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Surat
                                Online</a>
                            <a href="{{ route('public.layanan.status') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Cek
                                Status</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ route('public.layanan.pengaduan') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium transition">Pengaduan</a>
                        </div>
                    </div>

                    {{-- Kontak --}}
                    <a href="{{ route('public.contact') }}"
                        class="text-sm font-bold transition-all relative group py-2 {{ request()->routeIs('public.contact') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                        Kontak
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('public.contact') ? 'scale-x-100' : '' }}"></span>
                    </a>

                </div>
            </div>

            {{-- 3. ACTIONS AREA (KANAN) --}}
            {{-- Width disamakan dengan KIRI (w-[280px]) agar center seimbang --}}
            <div class="hidden lg:flex items-center justify-end gap-3 lg:w-[280px]">

                {{-- Search Bar --}}
                <div class="relative group">
                    <form action="{{ route('public.search') }}" method="GET">
                        <input type="text" name="q" placeholder="Cari..."
                            class="w-32 focus:w-48 transition-all duration-300 pl-9 pr-4 py-2 rounded-full bg-slate-100 border-none text-sm focus:ring-2 focus:ring-blue-500/20 focus:bg-white">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                {{-- Button Login --}}
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-slate-900 text-white px-5 py-2 rounded-full text-xs font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-900/20 uppercase tracking-wide">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white border border-slate-200 text-slate-700 hover:border-blue-500 hover:text-blue-600 px-5 py-2 rounded-full text-xs font-bold transition uppercase tracking-wide">
                        Masuk
                    </a>
                @endauth
            </div>

            {{-- 4. MOBILE MENU BUTTON --}}
            <div class="flex lg:hidden items-center gap-4">
                <button id="mobile-menu-btn" class="text-slate-700 p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 5. MOBILE MENU LIST --}}
    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t space-y-1 shadow-xl max-h-[calc(100vh-80px)] overflow-y-auto pb-20">

        {{-- Search Mobile --}}
        <div class="p-6 pb-2 sticky top-0 bg-white z-10">
            <form action="{{ route('public.search') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Cari berita, potensi, layanan..."
                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:ring-2 focus:ring-blue-500">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>

        <a href="{{ route('home') }}"
            class="block px-6 py-4 bg-gray-50 text-slate-900 font-bold border-b border-gray-100">Beranda</a>

        {{-- Accordion Menu untuk Mobile --}}
        <div class="px-6 py-4">
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Menu Utama</h4>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('public.profile') }}"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-blue-50 text-blue-700 hover:bg-blue-100 transition">
                    <span class="text-2xl mb-1">🏛️</span>
                    <span class="text-xs font-bold">Profil</span>
                </a>
                <a href="{{ route('public.news') }}"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-orange-50 text-orange-700 hover:bg-orange-100 transition">
                    <span class="text-2xl mb-1">📰</span>
                    <span class="text-xs font-bold">Berita</span>
                </a>
                <a href="{{ route('public.potentials') }}"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition">
                    <span class="text-2xl mb-1">🌳</span>
                    <span class="text-xs font-bold">Potensi</span>
                </a>
                <a href="{{ route('public.transparency.apbdes') }}"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-cyan-50 text-cyan-700 hover:bg-cyan-100 transition">
                    <span class="text-2xl mb-1">📊</span>
                    <span class="text-xs font-bold">Data</span>
                </a>
            </div>
        </div>

        <div class="border-t border-gray-100"></div>

        <div class="px-6 py-4 space-y-1">
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Lainnya</h4>
            <a href="{{ route('public.structure') }}" class="block py-2 text-sm text-slate-600">Struktur &
                Perangkat</a>
            <a href="{{ route('public.layanan.surat') }}" class="block py-2 text-sm text-slate-600">Layanan Surat</a>
            <a href="{{ route('public.contact') }}" class="block py-2 text-sm text-slate-600">Kontak Kami</a>
        </div>

        {{-- Login Mobile --}}
        <div class="p-6">
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="block w-full bg-slate-900 text-white text-center py-3 rounded-xl font-bold shadow-lg">Dashboard
                    Admin</a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full border border-slate-300 text-slate-600 text-center py-3 rounded-xl font-bold hover:bg-slate-50">Masuk
                    Admin</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Script Toggle Mobile Menu
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Effect Glassmorphism saat scroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.add('shadow-sm');
        } else {
            navbar.classList.remove('shadow-sm');
        }
    });
</script>
