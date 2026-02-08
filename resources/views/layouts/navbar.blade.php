<nav class="fixed w-full z-50 top-0 transition-all duration-300 bg-white/90 backdrop-blur-md border-b border-white/20 shadow-sm supports-[backdrop-filter]:bg-white/60" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-[72px]">

            {{-- 1. LOGO AREA --}}
            <div class="flex-shrink-0 flex items-center min-w-[200px]">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                    @if ($profile?->logo_path)
                        <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo"
                            class="h-9 w-9 object-contain group-hover:scale-105 transition duration-300 drop-shadow-sm">
                    @endif
                    <div class="flex flex-col">
                        <span
                            class="text-base font-extrabold text-slate-800 leading-none group-hover:text-blue-700 transition hidden sm:block tracking-tight font-sans">
                            {{ $profile?->village_name ?? 'Desa Digital' }}
                        </span>
                        <span
                            class="text-[9px] font-bold tracking-[0.2em] text-slate-400 uppercase hidden sm:block mt-0.5">
                            Kab. Tasikmalaya
                        </span>
                    </div>
                </a>
            </div>

            {{-- 2. MENU DESKTOP (Modern Pill Style) --}}
            <div class="hidden lg:flex flex-1 justify-center items-center">
                <div class="flex items-center gap-1 bg-slate-100/50 p-1.5 rounded-full border border-slate-100">

                    {{-- Beranda --}}
                    <a href="{{ route('home') }}"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('home') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-white/50' }}">
                        Beranda
                    </a>

                    {{-- Profil --}}
                    <a href="{{ route('public.profile') }}"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('public.profile') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-white/50' }}">
                        Profil
                    </a>

                    {{-- Dropdown Pemerintahan --}}
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full text-slate-500 hover:text-slate-800 hover:bg-white/50 transition-all focus:outline-none">
                            Pemerintahan
                            <svg class="w-3 h-3 opacity-40 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 py-1 z-50">
                            <a href="{{ route('public.government.structure') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Struktur Organisasi</a>
                            <a href="{{ route('public.government.officials') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Perangkat Desa</a>
                            <a href="{{ route('public.government.institutions') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Lembaga Desa</a>
                            <a href="{{ route('public.government.rtrw') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Data RT / RW</a>
                        </div>
                    </div>

                    {{-- Dropdown Informasi --}}
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full text-slate-500 hover:text-slate-800 hover:bg-white/50 transition-all focus:outline-none">
                            Informasi
                            <svg class="w-3 h-3 opacity-40 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-1 z-50">
                            <a href="{{ route('public.news.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Berita Desa</a>
                            <a href="{{ route('public.announcements.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Pengumuman</a>
                            <a href="{{ route('public.agenda.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Agenda Kegiatan</a>
                            <a href="{{ route('public.gallery.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Galeri Foto</a>
                        </div>
                    </div>

                    {{-- Dropdown Layanan --}}
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full text-slate-500 hover:text-slate-800 hover:bg-white/50 transition-all focus:outline-none">
                            Layanan
                            <svg class="w-3 h-3 opacity-40 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-1 z-50">
                            <a href="{{ route('public.services.mail.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Surat Online</a>
                            <a href="{{ route('public.services.status') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Cek Status</a>
                            <div class="h-px bg-slate-100 my-1"></div>
                            <a href="{{ route('public.services.complaints.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Pengaduan</a>
                        </div>
                    </div>

                    {{-- Dropdown Transparansi --}}
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full text-slate-500 hover:text-slate-800 hover:bg-white/50 transition-all focus:outline-none">
                            Transparansi
                            <svg class="w-3 h-3 opacity-40 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top py-1 z-50">
                            <a href="{{ route('public.transparency.apbdes') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Laporan APBDes</a>
                            <a href="{{ route('public.transparency.realisasi') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Realisasi Anggaran</a>
                            <a href="{{ route('public.transparency.reports') }}" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-blue-600 font-medium transition">Laporan Kegiatan</a>
                        </div>
                    </div>

                    {{-- Potensi --}}
                    <a href="{{ route('public.potentials.index') }}"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('public.potentials*') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-white/50' }}">
                        Potensi
                    </a>

                    {{-- Kontak --}}
                    <a href="{{ route('public.contact') }}"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('public.contact') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-white/50' }}">
                        Kontak
                    </a>

                </div>
            </div>

            {{-- 3. ACTIONS AREA --}}
            <div class="hidden lg:flex items-center justify-end gap-3 min-w-[200px]">
                
                {{-- Minimalist Search --}}
                <div class="relative group">
                    <form action="{{ route('public.search') }}" method="GET" class="flex items-center">
                        <input type="text" name="q" placeholder="Cari..."
                            class="w-8 focus:w-40 transition-all duration-300 pl-8 pr-3 py-1.5 rounded-full bg-transparent focus:bg-slate-50 border border-transparent focus:border-slate-200 text-xs focus:ring-0 cursor-pointer focus:cursor-text">
                        <svg class="w-4 h-4 text-slate-400 absolute left-2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                <div class="h-4 w-px bg-slate-200 mx-1"></div>

                {{-- Button Login --}}
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 bg-slate-900 text-white px-4 py-1.5 rounded-full text-[10px] font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-900/10 uppercase tracking-widest border border-slate-900">
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 bg-white text-slate-700 border border-slate-200 px-4 py-1.5 rounded-full text-[10px] font-bold hover:border-blue-500 hover:text-blue-600 transition uppercase tracking-widest hover:bg-blue-50/50">
                        <span>Login</span>
                    </a>
                @endauth
            </div>

            {{-- 4. MOBILE MENU BUTTON --}}
            <div class="flex lg:hidden items-center gap-4">
                <button id="mobile-menu-btn" class="text-slate-700 p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- 5. MOBILE MENU LIST --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t space-y-1 shadow-xl max-h-[calc(100vh-80px)] overflow-y-auto pb-20">
        {{-- ... Mobile Menu Content (Keeping standard) ... --}}
        <div class="p-4 sticky top-0 bg-white z-10 border-b border-gray-100">
            <form action="{{ route('public.search') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Cari..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-slate-50 border border-slate-200 text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>
        
        <div class="grid grid-cols-2 gap-2 p-4">
             <a href="{{ route('home') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 transition border border-gray-100">
                <span class="text-xs font-bold uppercase tracking-wide">Beranda</span>
            </a>
             <a href="{{ route('public.profile') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 transition border border-gray-100">
                <span class="text-xs font-bold uppercase tracking-wide">Profil</span>
            </a>
             <a href="{{ route('public.news.index') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 transition border border-gray-100">
                <span class="text-xs font-bold uppercase tracking-wide">Berita</span>
            </a>
             <a href="{{ route('public.potentials.index') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 transition border border-gray-100">
                <span class="text-xs font-bold uppercase tracking-wide">Potensi</span>
            </a>
        </div>
        
        <div class="px-4 py-2 space-y-2" x-data="{ activeAccordion: null }">
            <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 px-2">Menu Lainnya</h4>
            
            {{-- Accordion Pemerintahan --}}
            <div class="bg-gray-50 rounded-xl border border-gray-100 overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 'pemerintahan' ? null : 'pemerintahan'" 
                    class="w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-slate-700 hover:bg-white transition">
                    <span>Pemerintahan</span>
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" 
                        :class="activeAccordion === 'pemerintahan' ? 'rotate-180' : ''" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="activeAccordion === 'pemerintahan'" x-collapse class="bg-white border-t border-gray-100">
                    <a href="{{ route('public.government.structure') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Struktur Organisasi</a>
                    <a href="{{ route('public.government.officials') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Perangkat Desa</a>
                    <a href="{{ route('public.government.institutions') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Lembaga Desa</a>
                    <a href="{{ route('public.government.rtrw') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Data RT/RW</a>
                </div>
            </div>

            {{-- Accordion Transparansi --}}
            <div class="bg-gray-50 rounded-xl border border-gray-100 overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 'transparansi' ? null : 'transparansi'" 
                    class="w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-slate-700 hover:bg-white transition">
                    <span>Transparansi</span>
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" 
                        :class="activeAccordion === 'transparansi' ? 'rotate-180' : ''" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="activeAccordion === 'transparansi'" x-collapse class="bg-white border-t border-gray-100">
                    <a href="{{ route('public.transparency.apbdes') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Laporan APBDes</a>
                    <a href="{{ route('public.transparency.realisasi') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Realisasi Anggaran</a>
                    <a href="{{ route('public.transparency.reports') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Laporan Kegiatan</a>
                </div>
            </div>

            {{-- Accordion Layanan --}}
            <div class="bg-gray-50 rounded-xl border border-gray-100 overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 'layanan' ? null : 'layanan'" 
                    class="w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-slate-700 hover:bg-white transition">
                    <span>Layanan</span>
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" 
                        :class="activeAccordion === 'layanan' ? 'rotate-180' : ''" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="activeAccordion === 'layanan'" x-collapse class="bg-white border-t border-gray-100">
                    <a href="{{ route('public.services.mail.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Surat Online</a>
                    <a href="{{ route('public.services.status') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Cek Status Surat</a>
                    <a href="{{ route('public.services.complaints.index') }}" class="block px-4 py-2 text-xs text-slate-600 hover:text-blue-600">Pengaduan Masyarakat</a>
                </div>
            </div>
            
            <a href="{{ route('public.contact') }}" class="block w-full text-center px-4 py-3 text-sm font-medium text-slate-700 bg-gray-50 hover:bg-white hover:text-blue-600 border border-gray-100 rounded-xl transition">
                Kontak Kami
            </a>
        </div>

        <div class="p-4">
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="block w-full bg-slate-900 text-white text-center py-3 rounded-xl text-sm font-bold shadow-lg uppercase tracking-wide">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full border border-slate-200 text-slate-600 text-center py-3 rounded-xl text-sm font-bold hover:bg-slate-50 uppercase tracking-wide">Login Admin</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.add('shadow-sm');
        } else {
            navbar.classList.remove('shadow-sm');
        }
    });
</script>
