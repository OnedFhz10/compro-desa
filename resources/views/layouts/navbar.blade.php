@php
    $navProfile = \App\Models\VillageProfile::first();
@endphp

<nav class="glass-nav fixed w-full z-50 top-0 transition-all duration-300" id="navbar">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- 1. LOGO AREA --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                @if ($navProfile && $navProfile->logo_path)
                    <img src="{{ asset('storage/' . $navProfile->logo_path) }}" alt="Logo"
                        class="h-10 w-10 object-contain group-hover:scale-105 transition duration-300 drop-shadow-sm">
                @endif
                <div class="flex flex-col">
                    <span class="text-lg font-bold text-slate-900 leading-none group-hover:text-blue-700 transition">
                        {{ $navProfile->village_name ?? 'Desa Digital' }}
                    </span>
                    <span class="text-[10px] font-bold tracking-widest text-slate-500 uppercase">Kabupaten
                        Tasikmalaya</span>
                </div>
            </a>

            {{-- 2. MENU DESKTOP --}}
            <div class="hidden lg:flex items-center gap-1 bg-gray-100/50 p-1 rounded-full border border-gray-200/50">

                {{-- Beranda --}}
                <a href="{{ route('home') }}"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ request()->routeIs('home') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-600 hover:text-blue-600' }}">
                    Beranda
                </a>

                {{-- Profil --}}
                <a href="{{ route('public.profile') }}"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ request()->routeIs('public.profile') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-600 hover:text-blue-600' }}">
                    Profil
                </a>

                {{-- A. DROPDOWN PEMERINTAHAN --}}
                <div class="relative group px-4 py-2">
                    <button
                        class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:outline-none">
                        Pemerintahan
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                        <a href="{{ route('public.structure') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Struktur
                            Organisasi</a>
                        <a href="{{ route('public.officials') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Perangkat
                            Desa</a>
                        <a href="{{ route('public.institutions') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Lembaga
                            Desa</a>
                        <a href="{{ route('public.rtrw') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Data
                            RT / RW</a>
                    </div>
                </div>

                {{-- B. DROPDOWN TRANSPARANSI --}}
                <div class="relative group px-4 py-2">
                    <button
                        class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:outline-none">
                        Transparansi
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                        <a href="{{ route('public.transparency.apbdes') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">APBDes</a>
                        <a href="{{ route('public.transparency.realisasi') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Realisasi
                            Anggaran</a>
                        <a href="{{ route('public.transparency.laporan') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Laporan</a>
                    </div>
                </div>

                {{-- C. DROPDOWN POTENSI --}}
                <div class="relative group px-4 py-2">
                    <button
                        class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:outline-none">
                        Potensi
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                        <a href="{{ route('public.potentials') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium mx-2 rounded-lg transition">Semua
                            Potensi</a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="{{ route('public.potentials.category', 'wisata') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium mx-2 rounded-lg transition">Wisata</a>
                        <a href="{{ route('public.potentials.category', 'umkm') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium mx-2 rounded-lg transition">UMKM</a>
                        <a href="{{ route('public.potentials.category', 'produk') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-medium mx-2 rounded-lg transition">Produk
                            Unggulan</a>
                    </div>
                </div>

                {{-- D. DROPDOWN INFORMASI --}}
                <div class="relative group px-4 py-2">
                    <button
                        class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:outline-none">
                        Informasi
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                        <a href="{{ route('public.news') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Berita
                            Desa</a>
                        <a href="{{ route('public.announcements') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Pengumuman</a>
                        <a href="{{ route('public.agenda') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Agenda
                            Kegiatan</a>
                        <a href="{{ route('public.gallery') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Galeri
                            Foto</a>
                    </div>
                </div>

                {{-- E. DROPDOWN LAYANAN --}}
                <div class="relative group px-4 py-2">
                    <button
                        class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:outline-none">
                        Layanan
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-2 z-50">
                        <a href="{{ route('public.layanan.surat') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Surat
                            Online</a>
                        <a href="{{ route('public.layanan.status') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Cek
                            Status Pengajuan</a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="{{ route('public.layanan.pengaduan') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">Pengaduan
                            & Aspirasi</a>
                        <a href="{{ route('public.layanan.faq') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600 font-medium mx-2 rounded-lg transition">FAQ</a>
                    </div>
                </div>

                {{-- F. KONTAK --}}
                <a href="{{ route('public.contact') }}"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ request()->routeIs('public.contact') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-600 hover:text-blue-600' }}">
                    Kontak
                </a>

            </div>

            {{-- 3. BUTTON LOGIN / DASHBOARD --}}
            <div class="hidden lg:block">
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-slate-900 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-900/20">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-blue-700 font-semibold text-sm">Masuk
                        Admin</a>
                @endauth
            </div>

            {{-- 4. MOBILE MENU BUTTON --}}
            <button id="mobile-menu-btn" class="lg:hidden text-slate-700 p-2 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- 5. MOBILE MENU LIST --}}
    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t space-y-1 shadow-xl h-[calc(100vh-80px)] overflow-y-auto pb-20">
        <a href="{{ route('home') }}"
            class="block px-6 py-4 bg-gray-50 text-slate-900 font-bold border-b border-gray-100">Beranda</a>
        <a href="{{ route('public.profile') }}"
            class="block px-6 py-4 text-slate-600 font-semibold border-b border-gray-100 hover:bg-gray-50">Profil
            Desa</a>

        {{-- Group Pemerintahan --}}
        <div class="py-4 border-b border-gray-100">
            <span class="px-6 text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Pemerintahan</span>
            <div class="space-y-1">
                <a href="{{ route('public.structure') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Struktur Organisasi</a>
                <a href="{{ route('public.officials') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Perangkat Desa</a>
                <a href="{{ route('public.institutions') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Lembaga Desa</a>
                <a href="{{ route('public.rtrw') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">RT / RW</a>
            </div>
        </div>

        {{-- Group Transparansi --}}
        <div class="py-4 border-b border-gray-100">
            <span class="px-6 text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Transparansi</span>
            <div class="space-y-1">
                <a href="{{ route('public.transparency.apbdes') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">APBDes</a>
                <a href="{{ route('public.transparency.realisasi') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Realisasi</a>
                <a href="{{ route('public.transparency.laporan') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Laporan</a>
            </div>
        </div>

        {{-- Group Potensi --}}
        <div class="py-4 border-b border-gray-100">
            <span class="px-6 text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Potensi Desa</span>
            <div class="space-y-1">
                <a href="{{ route('public.potentials') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-emerald-600">Semua Potensi</a>
                <a href="{{ route('public.potentials.category', 'wisata') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-emerald-600">Wisata</a>
                <a href="{{ route('public.potentials.category', 'umkm') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-emerald-600">UMKM</a>
                <a href="{{ route('public.potentials.category', 'produk') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-emerald-600">Produk</a>
            </div>
        </div>

        {{-- Group Informasi --}}
        <div class="py-4 border-b border-gray-100">
            <span class="px-6 text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Informasi
                Publik</span>
            <div class="space-y-1">
                <a href="{{ route('public.news') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Berita</a>
                <a href="{{ route('public.announcements') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Pengumuman</a>
                <a href="{{ route('public.agenda') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Agenda</a>
                <a href="{{ route('public.gallery') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Galeri</a>
            </div>
        </div>

        {{-- Group Layanan --}}
        <div class="py-4 border-b border-gray-100">
            <span class="px-6 text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Layanan
                Mandiri</span>
            <div class="space-y-1">
                <a href="{{ route('public.layanan.surat') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Surat Online</a>
                <a href="{{ route('public.layanan.status') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Cek Status</a>
                <a href="{{ route('public.layanan.pengaduan') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">Pengaduan</a>
                <a href="{{ route('public.layanan.faq') }}"
                    class="block px-8 py-2 text-sm text-slate-600 hover:text-blue-600">FAQ</a>
            </div>
        </div>

        <a href="{{ route('public.contact') }}"
            class="block px-6 py-4 text-slate-600 font-semibold border-b border-gray-100 hover:bg-gray-50">Kontak</a>

        {{-- Login Mobile --}}
        <div class="p-6">
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="block w-full bg-slate-900 text-white text-center py-3 rounded-xl font-bold">Dashboard Admin</a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full border border-slate-300 text-slate-600 text-center py-3 rounded-xl font-bold hover:bg-slate-50">Masuk
                    Admin</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
