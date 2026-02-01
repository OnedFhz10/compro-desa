<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white border-r border-slate-800 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col shadow-2xl h-screen">

    {{-- 1. LOGO / BRANDING --}}
    <div class="flex items-center justify-center h-20 bg-slate-950 border-b border-slate-800 shrink-0">
        <div class="flex items-center gap-3">
            <div
                class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-900/50">
                A
            </div>
            <div class="flex flex-col">
                <span class="text-lg font-bold tracking-wider text-slate-100 uppercase leading-none">Admin</span>
                <span class="text-[10px] text-slate-500 uppercase tracking-widest leading-none mt-1">Panel Desa</span>
            </div>
        </div>
    </div>

    {{-- 2. NAVIGASI MENU --}}
    <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1 custom-scrollbar">

        {{-- A. DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- SEPARATOR: UTAMA --}}
        <div class="px-4 mt-6 mb-2 text-xs font-bold text-slate-600 uppercase tracking-wider">
            Menu Utama
        </div>

        {{-- B. PROFIL DESA --}}
        <a href="{{ route('admin.profile.edit') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.profile.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <span class="font-medium">Profil Desa</span>
        </a>

        {{-- C. PEMERINTAHAN (Dropdown) --}}
        <div x-data="{ open: {{ request()->routeIs('admin.officials.*', 'admin.institutions.*', 'admin.neighborhoods.*') ? 'true' : 'false' }} }" class="space-y-1">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('admin.officials.*', 'admin.institutions.*', 'admin.neighborhoods.*') ? 'bg-slate-800/50 text-white' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="font-medium">Pemerintahan</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-11 pr-2 space-y-1">
                <a href="{{ route('admin.officials.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.officials.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Perangkat
                    & Struktur</a>
                <a href="{{ route('admin.institutions.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.institutions.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Lembaga
                    Desa</a>
                <a href="{{ route('admin.neighborhoods.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.neighborhoods.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Data
                    RT / RW</a>
            </div>
        </div>

        {{-- D. INFORMASI PUBLIK (Dropdown) --}}
        {{-- Menggabungkan Berita, Pengumuman, Agenda, Galeri dalam satu dropdown --}}
        <div x-data="{ open: {{ request()->routeIs('admin.posts.*', 'admin.agendas.*', 'admin.galleries.*') ? 'true' : 'false' }} }" class="space-y-1">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('admin.posts.*', 'admin.agendas.*', 'admin.galleries.*') ? 'bg-slate-800/50 text-white' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    <span class="font-medium">Informasi Publik</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-11 pr-2 space-y-1">
                {{-- 1. Berita Desa --}}
                <a href="{{ route('admin.posts.index', ['category' => 'berita']) }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->fullUrlIs('*category=berita*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">
                    Berita Desa
                </a>
                {{-- 2. Pengumuman --}}
                <a href="{{ route('admin.posts.index', ['category' => 'pengumuman']) }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->fullUrlIs('*category=pengumuman*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">
                    Pengumuman
                </a>
                {{-- 3. Agenda Kegiatan --}}
                <a href="{{ route('admin.agendas.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.agendas.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">
                    Agenda Kegiatan
                </a>
                {{-- 4. Galeri Foto --}}
                <a href="{{ route('admin.galleries.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.galleries.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">
                    Galeri Foto
                </a>
            </div>
        </div>

        {{-- SEPARATOR: POTENSI & DATA --}}
        <div class="px-4 mt-6 mb-2 text-xs font-bold text-slate-600 uppercase tracking-wider">
            Potensi & Data
        </div>

        {{-- E. POTENSI DESA --}}
        <a href="{{ route('admin.potentials.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.potentials.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
            </svg>
            <span class="font-medium">Potensi Desa</span>
        </a>

        {{-- F. TRANSPARANSI --}}
        <a href="{{ route('admin.budgets.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.budgets.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium">Transparansi</span>
        </a>

        {{-- SEPARATOR: LAYANAN --}}
        <div class="px-4 mt-6 mb-2 text-xs font-bold text-slate-600 uppercase tracking-wider">
            Layanan
        </div>

        {{-- G. LAYANAN ONLINE (Dropdown) --}}
        <div x-data="{ open: {{ request()->routeIs('admin.letters.*', 'admin.complaints.*', 'admin.faqs.*') ? 'true' : 'false' }} }" class="space-y-1">
            <button @click="open = !open"
                class="flex items-center justify-between w-full px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition group {{ request()->routeIs('admin.letters.*', 'admin.complaints.*', 'admin.faqs.*') ? 'bg-slate-800/50 text-white' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="font-medium">Layanan Online</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-11 pr-2 space-y-1">
                <a href="{{ route('admin.letters.index') }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.letters.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Permohonan
                    Surat</a>
                <a href="{{ Route::has('admin.complaints.index') ? route('admin.complaints.index') : '#' }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.complaints.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Pengaduan
                    Warga</a>
                <a href="{{ Route::has('admin.faqs.index') ? route('admin.faqs.index') : '#' }}"
                    class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.faqs.*') ? 'text-blue-400 bg-blue-900/20' : 'text-slate-500 hover:text-white' }}">Tanya
                    Jawab (FAQ)</a>
            </div>
        </div>

    </nav>

    {{-- 3. LOGOUT BUTTON --}}
    <div class="p-4 border-t border-slate-800 bg-slate-950 shrink-0">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center py-2.5 px-4 bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white rounded-xl transition duration-200 font-bold group">
                <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Keluar
            </button>
        </form>
    </div>

</aside>
