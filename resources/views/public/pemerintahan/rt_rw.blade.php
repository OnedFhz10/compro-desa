@extends('layouts.app')

@section('title', 'Data RT & RW')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?q=80&w=2922&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Wilayah</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Data RT & RW
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Pemetaan administratif wilayah {{ $profile?->village_name ?? 'Desa' }} mulai dari Dusun hingga tingkat RT.
            </p>
        </div>
    </section>

    {{-- 2. CONTENT LIST --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-20">
        <div class="space-y-8 animate-fade-in-up animation-delay-500">
            @forelse ($neighborhoods as $dusun => $rws)
                {{-- Card Per Dusun --}}
                <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-xl shadow-slate-200/50 border border-gray-100">

                    {{-- Header Dusun --}}
                    <div class="flex items-center gap-4 mb-8 pb-4 border-b border-slate-100">
                        <div class="bg-blue-600 p-3 rounded-xl text-white shadow-lg shadow-blue-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm text-slate-500 font-bold uppercase tracking-wider">Wilayah</span>
                            <h2 class="text-2xl font-bold text-slate-900 leading-none mt-1">Dusun {{ $dusun }}</h2>
                        </div>
                    </div>

                    {{-- Grid RW --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($rws as $rw => $data_rt)
                            <div
                                class="bg-slate-50 rounded-2xl p-5 border border-slate-200 hover:border-blue-300 transition-colors">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-bold text-slate-800">RW {{ $rw }}</h3>
                                    <span
                                        class="bg-white border border-slate-200 text-slate-600 text-xs font-bold px-2 py-1 rounded-md shadow-sm">
                                        {{ $data_rt->count() }} RT
                                    </span>
                                </div>

                                {{-- List RT --}}
                                <ul class="space-y-2">
                                    @foreach ($data_rt as $rt)
                                        <li
                                            class="flex items-center justify-between text-sm bg-white p-2.5 rounded-lg border border-slate-100">
                                            <span class="font-bold text-blue-600">RT {{ $rt->rt }}</span>
                                            <span
                                                class="text-slate-500 text-xs uppercase font-medium truncate max-w-[100px]"
                                                title="{{ $rt->ketua_rt }}">
                                                {{ $rt->ketua_rt ?? 'Ketua -' }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-3xl p-12 text-center shadow-lg">
                    <p class="text-slate-500">Belum ada data wilayah RT/RW.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
