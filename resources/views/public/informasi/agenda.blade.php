@extends('layouts.app')
@section('title', 'Agenda Kegiatan')
@section('content')

    {{-- HEADER --}}
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="text-emerald-400 font-bold tracking-widest text-sm uppercase">Jadwal Desa</span>
            <h1 class="text-3xl lg:text-5xl font-extrabold text-white mt-2">Agenda Kegiatan</h1>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($agendas as $agenda)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 flex flex-col">
                        {{-- Date Badge Area (Top) --}}
                        <div class="bg-emerald-600 p-4 text-white flex justify-between items-center">
                            <div class="text-center bg-white/20 rounded-lg px-3 py-1">
                                <span class="block text-xs font-bold uppercase tracking-wider">Bulan</span>
                                <span
                                    class="block text-lg font-extrabold">{{ \Carbon\Carbon::parse($agenda->event_date)->format('M') }}</span>
                            </div>
                            <div class="text-4xl font-extrabold opacity-80">
                                {{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}
                            </div>
                        </div>

                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $agenda->title }}</h3>

                            <div class="space-y-2 mb-4 text-sm text-slate-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $agenda->location ?? 'Lokasi belum ditentukan' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($agenda->event_date)->format('l, d F Y') }}</span>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm line-clamp-3 mb-4">{{ $agenda->description }}</p>

                            {{-- Tombol (Jika ada link detail/flyer bisa ditambahkan) --}}
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <span class="text-xs font-bold text-emerald-600 uppercase tracking-wide">Akan Datang</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                        <span class="text-4xl">📅</span>
                        <p class="text-slate-500 mt-4">Belum ada agenda kegiatan mendatang.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">{{ $agendas->links() }}</div>
        </div>
    </div>
@endsection
