@php
    $profile = \App\Models\VillageProfile::first();
@endphp

<footer class="bg-slate-900 text-slate-300 pt-16 pb-8 mt-auto border-t border-slate-800">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            {{-- KOLOM 1: IDENTITAS --}}
            <div>
                <div class="flex items-center gap-3 mb-6">
                    @if ($profile && $profile->logo_path)
                        <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo"
                            class="h-12 w-auto bg-white p-1 rounded-lg">
                    @endif
                    <div>
                        <h3 class="text-white font-bold text-lg leading-none">
                            {{ $profile->village_name ?? 'Desa Digital' }}</h3>
                        <span class="text-xs text-slate-500 uppercase tracking-widest">Pemerintah Kab. Tasikmalaya</span>
                    </div>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Website resmi pusat informasi, pelayanan, dan transparansi pembangunan desa menuju kemandirian
                    digital.
                </p>
            </div>

            {{-- KOLOM 2: JELAJAH --}}
            <div>
                <h4 class="text-white font-bold mb-6 text-lg">Jelajah</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('public.profile') }}"
                            class="hover:text-blue-400 transition flex items-center gap-2"><span
                                class="text-blue-500">›</span> Profil Desa</a></li>
                    <li><a href="{{ route('public.structure') }}"
                            class="hover:text-blue-400 transition flex items-center gap-2"><span
                                class="text-blue-500">›</span> Pemerintahan</a></li>
                    <li><a href="{{ route('public.news') }}"
                            class="hover:text-blue-400 transition flex items-center gap-2"><span
                                class="text-blue-500">›</span> Berita Terkini</a></li>
                    <li><a href="{{ route('public.potentials') }}"
                            class="hover:text-blue-400 transition flex items-center gap-2"><span
                                class="text-blue-500">›</span> Potensi & Wisata</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: KONTAK --}}
            <div>
                <h4 class="text-white font-bold mb-6 text-lg">Kontak Kami</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $profile->address ?? 'Alamat kantor desa belum diisi.' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>{{ $profile->email ?? 'admin@desa.id' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span>{{ $profile->phone ?? '0812-xxxx-xxxx' }}</span>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 4: MAPS (Dummy Image agar rapi) --}}
            <div>
                <h4 class="text-white font-bold mb-6 text-lg">Lokasi</h4>
                <div
                    class="bg-slate-800 h-32 w-full rounded-xl flex items-center justify-center text-slate-600 border border-slate-700">
                    <span class="text-xs">Google Maps Integration</span>
                </div>
            </div>
        </div>

        <div
            class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} Pemerintah {{ $profile->village_name ?? 'Desa' }}. All rights reserved.</p>
            <p>Dibuat dengan ❤️ untuk Indonesia.</p>
        </div>
    </div>
</footer>
