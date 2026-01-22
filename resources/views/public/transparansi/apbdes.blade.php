@extends('layouts.app')
@section('title', 'APBDes')
@section('content')

    <div class="bg-slate-900 py-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">APBDes</h1>
            <p class="text-slate-300 text-lg">Transparansi Anggaran Pendapatan dan Belanja Desa.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @forelse($data as $item)
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden mb-12">
                    <div class="bg-blue-600 px-8 py-4 text-white flex justify-between items-center">
                        <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm font-bold">Tahun {{ $item->year }}</span>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                            {{-- Kolom Kiri: Infografis --}}
                            <div>
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                        class="w-full rounded-xl shadow-md cursor-pointer hover:opacity-90 transition"
                                        onclick="window.open(this.src)">
                                    <p class="text-center text-xs text-slate-400 mt-2">Klik gambar untuk memperbesar</p>
                                @else
                                    <div
                                        class="bg-slate-100 rounded-xl h-64 flex items-center justify-center text-slate-400">
                                        Infografis belum tersedia
                                    </div>
                                @endif
                            </div>

                            {{-- Kolom Kanan: Keterangan & Download --}}
                            <div>
                                <h3 class="font-bold text-slate-800 text-lg mb-4">Rincian Anggaran</h3>
                                <p class="text-slate-600 leading-relaxed mb-6">
                                    {{ $item->description ?? 'Tidak ada keterangan tambahan.' }}</p>

                                @if ($item->amount)
                                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 mb-6">
                                        <span class="block text-xs text-blue-600 font-bold uppercase">Total Anggaran</span>
                                        <span class="block text-3xl font-extrabold text-blue-800">Rp
                                            {{ number_format($item->amount, 0, ',', '.') }}</span>
                                    </div>
                                @endif

                                @if ($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                        class="inline-flex items-center gap-2 bg-slate-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-slate-800 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download Dokumen Lengkap (PDF)
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20">
                    <p class="text-slate-500">Data APBDes belum tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection
