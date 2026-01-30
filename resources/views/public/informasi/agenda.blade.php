@extends('layouts.app')

@section('title', 'Agenda Kegiatan')

@section('content')
    <div class="bg-emerald-600 py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-4">Agenda Kegiatan</h1>
            <p class="text-emerald-100 text-lg max-w-2xl mx-auto">
                Jadwal kegiatan dan acara yang akan dilaksanakan di desa.
            </p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @if (isset($agendas) && $agendas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($agendas as $agenda)
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-300">
                            {{-- Header Tanggal --}}
                            <div class="bg-emerald-600 px-6 py-4 flex justify-between items-center text-white">
                                <div class="flex flex-col">
                                    <span
                                        class="text-2xl font-bold leading-none">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
                                    <span
                                        class="text-xs uppercase font-medium">{{ \Carbon\Carbon::parse($agenda->event_date)->translatedFormat('M Y') }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="block text-xs opacity-80 uppercase tracking-wider">Jam</span>
                                    <span class="font-bold">{{ \Carbon\Carbon::parse($agenda->event_date)->format('H:i') }}
                                        WIB</span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-slate-800 mb-3 leading-snug">{{ $agenda->title }}</h3>

                                <div class="flex items-start gap-3 text-sm text-slate-600 mb-4">
                                    <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $agenda->location ?? 'Lokasi belum ditentukan' }}</span>
                                </div>

                                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                                    {{ $agenda->description }}
                                </p>

                                {{-- Status --}}
                                <div class="pt-4 border-t border-gray-100">
                                    <span
                                        class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Akan Datang
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $agendas->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                    <div class="text-6xl mb-4">📅</div>
                    <h3 class="text-xl font-bold text-slate-600">Belum ada agenda kegiatan</h3>
                    <p class="text-slate-400">Jadwal kegiatan akan diupdate segera.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
