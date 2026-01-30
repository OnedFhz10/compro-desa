<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white border-r border-slate-800 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col shadow-2xl">

    {{-- 1. LOGO / BRANDING --}}
    <div class="flex items-center justify-center h-16 bg-slate-950 border-b border-slate-800 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                D
            </div>
            <span class="text-lg font-bold tracking-wider text-slate-100 uppercase">Admin Desa</span>
        </div>
    </div>

    {{-- 2. NAVIGASI MENU --}}
    <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1 custom-scrollbar">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- GROUP: PEMERINTAHAN --}}
        <div class="pt-6 pb-2 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
            Data Pemerintahan
        </div>

        {{-- Profil Desa --}}
        <a href="{{ route('admin.profile.edit') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.profile.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <span class="font-medium">Profil Desa</span>
        </a>

        {{-- Perangkat Desa --}}
        <a href="{{ route('admin.officials.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.officials.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.officials.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span class="font-medium">Perangkat Desa</span>
        </a>

        {{-- Lembaga Desa --}}
        <a href="{{ route('admin.institutions.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.institutions.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.institutions.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
            </svg>
            <span class="font-medium">Lembaga Desa</span>
        </a>

        {{-- Data RT/RW --}}
        <a href="{{ route('admin.neighborhoods.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.neighborhoods.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.neighborhoods.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-medium">Data RT / RW</span>
        </a>

        {{-- GROUP: INFORMASI --}}
        <div class="pt-6 pb-2 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
            Informasi Publik
        </div>

        {{-- Berita --}}
        <a href="{{ route('admin.posts.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.posts.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.posts.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            <span class="font-medium">Berita & Artikel</span>
        </a>

        {{-- Potensi Desa --}}
        <a href="{{ route('admin.potentials.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.potentials.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.potentials.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                </path>
            </svg>
            <span class="font-medium">Potensi Desa</span>
        </a>

        {{-- Galeri Foto --}}
        <a href="{{ route('admin.galleries.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.galleries.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.galleries.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium">Galeri Foto</span>
        </a>

        {{-- GROUP: LAYANAN --}}
        <div class="pt-6 pb-2 px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
            Layanan & Transparansi
        </div>

        {{-- Permohonan Surat --}}
        <a href="{{ route('admin.letters.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.letters.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.letters.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium">Permohonan Surat</span>
        </a>

        {{-- APBDes --}}
        <a href="{{ route('admin.budgets.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.budgets.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.budgets.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium">Data APBDes</span>
        </a>

    </nav>

    {{-- 3. LOGOUT BUTTON --}}
    <div class="p-4 border-t border-slate-800 bg-slate-950">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center py-2.5 px-4 bg-red-600/10 text-red-500 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 text-sm font-bold border border-red-600/20 hover:border-red-600">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Keluar Aplikasi
            </button>
        </form>
    </div>
</aside>
