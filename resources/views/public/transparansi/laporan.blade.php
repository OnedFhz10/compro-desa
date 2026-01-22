@extends('layouts.app')
@section('title', 'Laporan Penyelenggaraan')
@section('content')

    <div class="bg-slate-900 py-20 text-center">
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Laporan Penyelenggaraan</h1>
        <p class="text-slate-300 text-lg">LPPDes dan Laporan Keterangan Penyelenggaraan Pemerintahan Desa.</p>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
            <div class="grid grid-cols-1 gap-6">
                @forelse($data as $item)
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition flex flex-col md:flex-row items-center gap-6 border-l-4 border-orange-500">
                        <div
                            class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 font-bold text-2xl flex-shrink-0">
                            📄
                        </div>
                        <div class="flex-grow text-center md:text-left">
                            <h3 class="text-lg font-bold text-slate-900">{{ $item->title }}</h3>
                            <p class="text-slate-500 text-sm mb-2">{{ $item->description }}</p>
                            <span
                                class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-semibold">Tahun
                                Anggaran {{ $item->year }}</span>
                        </div>
                        <div class="flex-shrink-0">
                            @if ($item->file_path)
                                <a href="{{ asset('storage/' . $item->file_path) }}"
                                    class="bg-orange-500 text-white px-6 py-2 rounded-full font-bold hover:bg-orange-600 transition text-sm flex items-center gap-2">
                                    Download
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </a>
                            @else
                                <span class="text-slate-400 text-sm italic">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 text-slate-500">Belum ada dokumen laporan.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
