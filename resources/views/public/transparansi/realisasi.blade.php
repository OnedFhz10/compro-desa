@extends('layouts.app')
@section('title', 'Realisasi Anggaran')
@section('content')

    <div class="bg-slate-900 py-20 text-center relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Realisasi Anggaran</h1>
            <p class="text-slate-300 text-lg">Laporan pelaksanaan dan penggunaan dana desa.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            @forelse($data as $item)
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden mb-12">
                    <div class="bg-emerald-600 px-8 py-4 text-white flex justify-between items-center">
                        <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm font-bold">Tahun {{ $item->year }}</span>
                    </div>

                    <div class="p-8">
                        <div class="flex flex-col lg:flex-row gap-8">
                            {{-- Gambar --}}
                            <div class="w-full lg:w-1/2">
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                        class="w-full rounded-xl shadow-md">
                                @else
                                    <div class="h-48 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                                        No Chart Image</div>
                                @endif
                            </div>
                            {{-- Teks --}}
                            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                                <p class="text-slate-600 mb-6 text-lg">{{ $item->description }}</p>
                                @if ($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}"
                                        class="inline-flex items-center justify-center gap-2 border-2 border-emerald-600 text-emerald-600 px-6 py-3 rounded-xl font-bold hover:bg-emerald-600 hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Unduh Laporan Realisasi
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 text-slate-500">Belum ada data realisasi.</div>
            @endforelse
        </div>
    </div>
@endsection
