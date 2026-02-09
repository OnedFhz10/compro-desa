@extends('layouts.app')

@section('title', 'Statistik Desa')

@section('content')
    {{-- HERO SECTION --}}
    <x-hero 
        title="Statistik Desa" 
        subtitle="Data Transparan untuk Kemajuan Bersama"
        image="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=60&w=1200&auto=format&fit=crop">
        Kumpulan data kependudukan dan potensi desa yang disajikan secara transparan dan akuntabel.
    </x-hero>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- 1. DATA UMUM & WILAYAH --}}
            <div class="mb-16 -mt-24 relative z-20">
                <div class="flex items-center gap-2 mb-6 text-white/90">
                     <span class="w-1 h-6 bg-blue-400 rounded-full shadow-[0_0_10px_rgba(96,165,250,0.5)]"></span>
                     <h2 class="text-xl font-bold tracking-wide uppercase">Gambaran Umum Wilayah</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {{-- Luas Wilayah --}}
                    <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mb-1">Luas Wilayah</p>
                                <h3 class="text-3xl font-extrabold text-slate-800">{{ $profile?->area_size ?? 0 }} <span class="text-sm font-medium text-slate-400">km²</span></h3>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Jumlah Penduduk --}}
                     <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mb-1">Total Penduduk</p>
                                <h3 class="text-3xl font-extrabold text-slate-800">{{ number_format($profile?->population ?? 0, 0, ',', '.') }} <span class="text-sm font-medium text-slate-400">Jiwa</span></h3>
                            </div>
                             <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                         {{-- Breakdown Gender --}}
                    </div>

                    {{-- Jumlah KK --}}
                    <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                         <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mb-1">Kepala Keluarga</p>
                                <h3 class="text-3xl font-extrabold text-slate-800">{{ number_format($profile?->total_families ?? 0, 0, ',', '.') }} <span class="text-sm font-medium text-slate-400">KK</span></h3>
                            </div>
                             <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Kepadatan (Opsional/Calculated) --}}
                     <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mb-1">Kepadatan</p>
                                @php
                                    $density = ($profile?->area_size > 0) ? ($profile->population / $profile->area_size) : 0;
                                @endphp
                                <h3 class="text-3xl font-extrabold text-slate-800">{{ number_format($density, 0, ',', '.') }} <span class="text-xs font-medium text-slate-400">Jiwa/km²</span></h3>
                            </div>
                             <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Batas Wilayah --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                    <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600">U</div>
                        <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Sebelah Utara</p>
                            <p class="font-bold text-slate-800">{{ $profile?->boundary_north ?? '-' }}</p>
                        </div>
                    </div>
                     <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600">S</div>
                       <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Sebelah Selatan</p>
                            <p class="font-bold text-slate-800">{{ $profile?->boundary_south ?? '-' }}</p>
                        </div>
                    </div>
                     <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600">T</div>
                       <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Sebelah Timur</p>
                            <p class="font-bold text-slate-800">{{ $profile?->boundary_east ?? '-' }}</p>
                        </div>
                    </div>
                     <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100 flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600">B</div>
                         <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Sebelah Barat</p>
                            <p class="font-bold text-slate-800">{{ $profile?->boundary_west ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. GRAFIK STATISTIK --}}
            <div class="grid grid-cols-1 gap-8">
                {{-- Row 1: Demografi --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- Chart Gender --}}
                    {{-- <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg></div>
                             <h3 class="text-xl font-bold text-slate-800">Demografi Gender</h3>
                        </div>
                        <div class="h-64">
                            <canvas id="chartGender"></canvas>
                        </div>
                    </div> --}}
                    
                     {{-- Demografi Gender (Pie) --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-800">Demografi Gender</h3>
                                    <p class="text-xs text-slate-400">Perbandingan Laki-laki & Perempuan</p>
                                </div>
                            </div>
                        </div>
                        <div class="relative h-72 w-full">
                            <canvas id="chartGender"></canvas>
                        </div>
                    </div>

                    {{-- Chart Pendidikan --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shadow-sm"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg></div>
                             <div>
                                <h3 class="text-xl font-bold text-slate-800">Tingkat Pendidikan</h3>
                                <p class="text-xs text-slate-400">Jenjang pendidikan penduduk</p>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="chartPendidikan"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Row 2: Ekonomi & Sosial --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                     {{-- Chart Pekerjaan --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center shadow-sm"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                             <div>
                                <h3 class="text-xl font-bold text-slate-800">Mata Pencaharian</h3>
                                <p class="text-xs text-slate-400">Profesi utama penduduk</p>
                            </div>
                        </div>
                        <div class="h-96">
                            <canvas id="chartPekerjaan"></canvas>
                        </div>
                    </div>

                    {{-- Chart Agama --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center shadow-sm"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
                             <div>
                                <h3 class="text-xl font-bold text-slate-800">Agama Penduduk</h3>
                                <p class="text-xs text-slate-400">Komposisi pemeluk agama</p>
                            </div>
                        </div>
                        <div class="h-64 w-full flex justify-center">
                            <canvas id="chartAgama"></canvas>
                        </div>
                         <div class="mt-6 space-y-3">
                            @if(isset($statistics['agama']))
                                @foreach($statistics['agama'] as $agama)
                                <div class="flex justify-between items-center text-sm border-b border-gray-50 pb-2 last:border-0 last:pb-0">
                                    <span class="font-medium text-slate-600">{{ $agama->name }}</span>
                                    <span class="font-bold text-slate-800">{{ $agama->value }}</span>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- CHART JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // --- 1. GENDER CHART (Doughnut) ---
        const ctxGender = document.getElementById('chartGender').getContext('2d');
        const dataGender = {
            labels: {!! isset($statistics['penduduk']) ? $statistics['penduduk']->pluck('name') : '[]' !!},
            datasets: [{
                data: {!! isset($statistics['penduduk']) ? $statistics['penduduk']->pluck('value') : '[]' !!},
                backgroundColor: ['#3B82F6', '#EC4899'], // Blue, Pink
                borderWidth: 0,
                hoverOffset: 4
            }]
        };
        new Chart(ctxGender, {
            type: 'doughnut',
            data: dataGender,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
                },
                cutout: '70%',
            }
        });

        // --- 2. PENDIDIKAN CHART (Bar) ---
        const ctxPendidikan = document.getElementById('chartPendidikan').getContext('2d');
        const dataPendidikan = {
            labels: {!! isset($statistics['pendidikan']) ? $statistics['pendidikan']->pluck('name') : '[]' !!},
            datasets: [{
                label: 'Jumlah Orang',
                data: {!! isset($statistics['pendidikan']) ? $statistics['pendidikan']->pluck('value') : '[]' !!},
                backgroundColor: '#60A5FA', // Blue-400
                borderRadius: 8,
            }]
        };
        new Chart(ctxPendidikan, {
            type: 'bar',
            data: dataPendidikan,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y', // Horizontal Bar
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { display: false } }
                }
            }
        });

        // --- 3. PEKERJAAN CHART (Bar Vertical) ---
        const ctxPekerjaan = document.getElementById('chartPekerjaan').getContext('2d');
        const dataPekerjaan = {
             labels: {!! isset($statistics['pekerjaan']) ? $statistics['pekerjaan']->pluck('name') : '[]' !!},
            datasets: [{
                label: 'Jumlah Orang',
                data: {!! isset($statistics['pekerjaan']) ? $statistics['pekerjaan']->pluck('value') : '[]' !!},
                backgroundColor: '#FBBF24', // Amber-400
                borderRadius: 8,
            }]
        };
        new Chart(ctxPekerjaan, {
             type: 'bar',
            data: dataPekerjaan,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                 plugins: {
                    legend: { display: false }
                },
                 scales: {
                    x: { grid: { display: false }, ticks: { autoSkip: false, maxRotation: 90, minRotation: 0 } },
                    y: { grid: { color: '#f3f4f6' } }
                }
            }
        });

        // --- 4. AGAMA CHART (Pie) ---
        const ctxAgama = document.getElementById('chartAgama').getContext('2d');
         const dataAgama = {
            labels: {!! isset($statistics['agama']) ? $statistics['agama']->pluck('name') : '[]' !!},
            datasets: [{
                data: {!! isset($statistics['agama']) ? $statistics['agama']->pluck('value') : '[]' !!},
                backgroundColor: ['#10B981', '#6366F1', '#F59E0B', '#EF4444', '#8B5CF6', '#64748B'], 
                borderWidth: 0,
            }]
        };
         new Chart(ctxAgama, {
            type: 'pie',
            data: dataAgama,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                 plugins: {
                    legend: { display: false } // Hide legend, use custom list below
                }
            }
        });

    </script>
@endsection
