@extends('layouts.app')

@section('title', 'Agenda Kegiatan')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-emerald-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=2938&auto=format&fit=crop"
                alt="Agenda Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span class="text-emerald-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Jadwal
                Desa</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Agenda Kegiatan
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Jangan lewatkan berbagai kegiatan, musyawarah, dan acara penting yang akan dilaksanakan.
            </p>
        </div>
    </section>

    {{-- 2. LIST AGENDA --}}
    <div class="bg-gray-50 py-20 min-h-screen relative z-30 -mt-10 pt-10">
        <div class="container mx-auto px-4 lg:px-8">

            @if (isset($agendas) && $agendas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up animation-delay-500">
                    @foreach ($agendas as $agenda)
                        @php
                            // Cek apakah acara sudah lewat
                            $isPast = \Carbon\Carbon::parse($agenda->date)->isPast();
                        @endphp

                        <div
                            class="bg-white rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50 border border-slate-100 hover:-translate-y-2 transition duration-300 flex flex-col h-full {{ $isPast ? 'opacity-75 grayscale hover:grayscale-0' : '' }}">

                            {{-- Header Tanggal (Warna beda jika lewat) --}}
                            <div
                                class="{{ $isPast ? 'bg-slate-500' : 'bg-emerald-600' }} px-6 py-5 flex justify-between items-center text-white relative overflow-hidden">
                                <div
                                    class="absolute top-0 right-0 w-24 h-24 bg-white opacity-10 rounded-full -translate-y-1/2 translate-x-1/2">
                                </div>

                                <div class="flex flex-col relative z-10">
                                    <span
                                        class="text-3xl font-extrabold leading-none">{{ \Carbon\Carbon::parse($agenda->date)->format('d') }}</span>
                                    <span
                                        class="text-xs font-bold uppercase tracking-widest opacity-90">{{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('F Y') }}</span>
                                </div>
                                <div class="text-right relative z-10">
                                    <span class="block text-xs font-medium opacity-80 uppercase tracking-wide">Hari</span>
                                    <span
                                        class="font-bold text-lg">{{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('l') }}</span>
                                </div>
                            </div>

                            <div class="p-8 flex flex-col flex-1">
                                {{-- Waktu & Lokasi --}}
                                <div class="flex flex-col gap-3 mb-6">
                                    <div class="flex items-start gap-3 text-slate-600">
                                        <div
                                            class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-emerald-600 flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-xs text-slate-400 uppercase font-bold">Waktu</span>
                                            <span class="font-bold text-sm">{{ $agenda->time }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 text-slate-600">
                                        <div
                                            class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-red-500 flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-xs text-slate-400 uppercase font-bold">Lokasi</span>
                                            <span class="font-bold text-sm">{{ $agenda->location }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Judul --}}
                                <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug">
                                    {{ $agenda->title }}
                                </h3>

                                <p class="text-slate-500 text-sm leading-relaxed mb-6 flex-1">
                                    {{ $agenda->description }}
                                </p>

                                {{-- Status Badge --}}
                                <div class="pt-6 border-t border-slate-100 flex justify-between items-center">
                                    @if ($isPast)
                                        <span
                                            class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">
                                            ✅ Selesai
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full border border-emerald-100">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                            Akan Datang
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center animate-fade-in-up animation-delay-700">
                    {{ $agendas->links() }}
                </div>
            @else
                <div
                    class="bg-white rounded-[2rem] p-16 text-center shadow-xl shadow-slate-200/50 border border-slate-100 max-w-2xl mx-auto">
                    <div class="text-7xl mb-6">🗓️</div>
                    <h3 class="text-2xl font-bold text-slate-700">Belum Ada Agenda</h3>
                    <p class="text-slate-500 mt-3">Jadwal kegiatan desa belum tersedia saat ini.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
