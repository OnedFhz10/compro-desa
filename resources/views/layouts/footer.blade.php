<footer class="bg-gradient-to-b from-slate-900 to-slate-950 text-slate-300 border-t border-slate-800 mt-auto relative overflow-hidden font-sans">

    {{-- Background Pattern & Effects --}}
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>
    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>
    
    {{-- Decorative Glows --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>

    {{-- MAIN CONTAINER --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">

            {{-- 1. BRANDING & INFO (4/12) --}}
            <div class="lg:col-span-4 space-y-6">
                {{-- Data $profile dikirim via AppServiceProvider (View Composer) --}}

                <div class="flex items-center gap-4 group">
                    @if ($profile?->logo_path)
                        <div class="relative">
                            <div class="absolute inset-0 bg-blue-500 blur-md opacity-20 group-hover:opacity-40 transition-opacity duration-500 rounded-full"></div>
                            <div class="relative bg-white/5 p-2 rounded-full backdrop-blur-md border border-white/10 shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" class="h-12 w-12 object-contain" alt="Logo Desa">
                            </div>
                        </div>
                    @endif
                    <div>
                        <h3 class="text-white text-2xl font-extrabold tracking-tight leading-none group-hover:text-blue-400 transition-colors duration-300">
                            {{ $profile?->village_name ?? 'Desa Digital' }}
                        </h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="h-[1px] w-6 bg-blue-500"></span>
                            <span class="text-xs text-blue-400 font-bold uppercase tracking-widest">Kabupaten Tasikmalaya</span>
                        </div>
                    </div>
                </div>

                <p class="text-slate-400 text-sm leading-relaxed pr-4 text-justify">
                    Mewujudkan tata kelola pemerintahan desa yang transparan, akuntabel, partisipatif, dan inovatif demi kesejahteraan masyarakat yang berkeadilan dan mandiri.
                </p>

                {{-- Social Media Icons --}}
                <div class="flex gap-3 pt-2">
                    @foreach(['facebook' => ['bg' => 'hover:bg-[#1877F2]', 'border' => 'hover:border-[#1877F2]', 'path' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                              'instagram' => ['bg' => 'hover:bg-pink-600', 'border' => 'hover:border-pink-500', 'path' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'],
                              'youtube' => ['bg' => 'hover:bg-red-600', 'border' => 'hover:border-red-500', 'path' => 'M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z']] as $key => $social)
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800/80 border border-slate-700/50 flex items-center justify-center text-slate-400 transition-all duration-300 group {{ $social['bg'] }} {{ $social['border'] }} hover:text-white hover:scale-110 hover:shadow-lg hover:shadow-{{ explode('-', $social['bg'])[1] }}-500/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $social['path'] }}"/></svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- 2. NAVIGATION (2/12) --}}
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-blue-600 rounded-full shadow-[0_0_10px_rgba(37,99,235,0.5)]"></span> Jelajahi
                </h4>
                <ul class="space-y-3 text-sm">
                    @foreach([
                        ['label' => 'Beranda', 'route' => 'home'],
                        ['label' => 'Profil Desa', 'route' => 'public.profile'],
                        ['label' => 'Berita Terbaru', 'route' => 'public.news.index'],
                        ['label' => 'Potensi Wisata', 'route' => 'public.potentials.index'],
                        ['label' => 'Data APBDes', 'route' => 'public.transparency.apbdes']
                    ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="group flex items-center gap-3 text-slate-400 hover:text-blue-400 transition-colors duration-300">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-blue-400 group-hover:scale-150 transition-all duration-300"></span>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">{{ $link['label'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- 3. CONTACT (3/12) --}}
            <div class="lg:col-span-3">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-emerald-500 rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]"></span> Kontak Kami
                </h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3 group">
                        <div class="mt-1 w-9 h-9 rounded-lg bg-slate-800/80 flex items-center justify-center flex-shrink-0 text-slate-400 group-hover:bg-blue-500/20 group-hover:text-blue-400 transition-colors duration-300 border border-slate-700/50 group-hover:border-blue-500/30">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="leading-relaxed text-slate-400 group-hover:text-slate-200 transition-colors">{{ $profile?->address ?? 'Alamat desa belum diatur di database.' }}</span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="w-9 h-9 rounded-lg bg-slate-800/80 flex items-center justify-center flex-shrink-0 text-slate-400 group-hover:bg-emerald-500/20 group-hover:text-emerald-400 transition-colors duration-300 border border-slate-700/50 group-hover:border-emerald-500/30">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span class="text-slate-400 group-hover:text-slate-200 transition-colors">{{ $profile?->phone ?? '-' }}</span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="w-9 h-9 rounded-lg bg-slate-800/80 flex items-center justify-center flex-shrink-0 text-slate-400 group-hover:bg-purple-500/20 group-hover:text-purple-400 transition-colors duration-300 border border-slate-700/50 group-hover:border-purple-500/30">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-slate-400 group-hover:text-slate-200 transition-colors">{{ $profile?->email ?? '-' }}</span>
                    </li>
                </ul>
            </div>

            {{-- 4. MAP (3/12) --}}
            <div class="lg:col-span-3">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-orange-500 rounded-full shadow-[0_0_10px_rgba(249,115,22,0.5)]"></span> Lokasi
                </h4>
                <div class="rounded-2xl overflow-hidden h-48 bg-slate-800 shadow-lg border border-slate-700 relative group ring-1 ring-white/5 hover:ring-blue-500/50 transition-all duration-500">
                    <iframe
                        src="https://maps.google.com/maps?q={{ urlencode(($profile?->village_name ?? 'Desa') . ' Tasikmalaya') }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        class="grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700 scale-100 group-hover:scale-105">
                    </iframe>
                    {{-- Overlay Actions --}}
                    <a href="https://maps.google.com/?q={{ $profile?->village_name ?? '' }}" target="_blank"
                        class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors">
                        <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                            <span class="bg-blue-600 text-white text-xs px-3 py-1.5 rounded-full shadow-lg font-medium flex items-center gap-1">
                                Buka Peta <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="border-t border-slate-800 bg-slate-950/80 backdrop-blur-sm relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p class="text-center md:text-left">&copy; {{ date('Y') }} Pemerintah 
                    <span class="text-slate-300 font-medium">
                        {{ \Illuminate\Support\Str::startsWith($profile?->village_name, 'Desa') ? $profile?->village_name : 'Desa ' . ($profile?->village_name ?? 'Digital') }}
                    </span>. 
                    Hak Cipta Dilindungi.
                </p>
                <div class="flex flex-wrap justify-center items-center gap-6">
                    <a href="#" class="hover:text-blue-400 transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-blue-400 transition-colors">Syarat & Ketentuan</a>
                    <span class="flex items-center gap-1.5 bg-slate-900/50 px-3 py-1 rounded-full border border-slate-800">
                        Dibuat dengan <span class="text-red-500 animate-pulse">❤️</span> untuk Indonesia
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Back to Top Button --}}
    <button id="backToTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
            class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg shadow-blue-600/30 transform translate-y-20 opacity-0 transition-all duration-300 hover:bg-blue-500 hover:scale-110 z-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            aria-label="Kembali ke atas">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
    </button>
    

</footer>
