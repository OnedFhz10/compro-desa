@extends('layouts.app')
@section('title', 'Realisasi Anggaran')
@section('content')

    {{-- HERO SECTION --}}
    <x-hero 
        title="Realisasi Anggaran" 
        subtitle="Laporan Pelaksanaan"
        image="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=2940&auto=format&fit=crop"
        height="h-[300px]"
    >
        Laporan Pelaksanaan Realisasi Anggaran Pendapatan dan Belanja Desa
    </x-hero>

    {{-- BREADCRUMB --}}
    <div class="bg-gray-50 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Transparansi</span>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Realisasi</span>
            </nav>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="bg-white py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            
            <div class="bg-gray-50/50 rounded-2xl border border-gray-100 overflow-hidden">
                {{-- MOBILE VIEW (Cards) --}}
                <div class="md:hidden space-y-4 p-4">
                    @forelse($data as $item)
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                                        {{ $item->year }}
                                    </span>
                                    <h3 class="font-bold text-slate-800 text-lg mt-1">{{ $item->getTypeLabelAttribute() }}</h3>
                                </div>
                                <div class="text-xs text-slate-400 font-medium">
                                    Realisasi
                                </div>
                            </div>
                            
                            <p class="text-slate-600 text-sm mb-4 leading-relaxed line-clamp-3">
                                {{ $item->description }}
                            </p>
                            
                            @if($item->amount)
                                <div class="mb-4">
                                    <span class="text-xs text-slate-400 uppercase font-bold tracking-wider block mb-1">Anggaran</span>
                                    <span class="font-mono text-slate-800 font-bold bg-slate-50 px-2 py-1 rounded border border-slate-200">
                                        {{ $item->formatted_amount }}
                                    </span>
                                </div>
                            @endif

                            @if ($item->file_path)
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" 
                                   class="flex items-center justify-center gap-2 w-full bg-green-600 active:bg-green-700 text-white py-2.5 rounded-lg text-sm font-bold transition shadow-lg shadow-green-600/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    <span>Download Dokumen</span>
                                </a>
                            @else
                                <div class="text-center py-2 bg-slate-50 rounded-lg text-slate-400 text-xs italic border border-dashed border-slate-200">
                                    Tidak ada file
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-10 text-slate-400">
                            <p>Data belum tersedia untuk tampilan mobile.</p>
                        </div>
                    @endforelse
                </div>

                {{-- DESKTOP VIEW (Table) --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-600 uppercase text-xs font-bold tracking-wider">
                                <th class="px-6 py-4 border-b border-gray-200">No</th>
                                <th class="px-6 py-4 border-b border-gray-200">Judul / Tahun</th>
                                <th class="px-6 py-4 border-b border-gray-200">Uraian</th>
                                <th class="px-6 py-4 border-b border-gray-200 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($data as $key => $item)
                                <tr class="hover:bg-slate-50/50 transition duration-150">
                                    <td class="px-6 py-4 text-gray-400 font-medium">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-800">{{ $item->getTypeLabelAttribute() }} {{ $item->year }}</div>
                                        <div class="text-xs text-green-600 font-bold uppercase mt-1">Realisasi {{ $item->year }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 max-w-lg leading-relaxed">
                                        {{ $item->description }}
                                        @if($item->amount)
                                            <div class="mt-2 font-mono text-slate-700 font-bold bg-slate-100 px-2 py-1 rounded inline-block text-xs border border-slate-200">
                                                {{ $item->formatted_amount }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($item->file_path)
                                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" 
                                               class="inline-flex items-center space-x-2 bg-white text-green-600 border border-green-200 hover:bg-green-50 hover:border-green-300 px-4 py-2 rounded-lg text-sm font-bold transition shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                <span>Download</span>
                                            </a>
                                        @else
                                            <span class="text-gray-300 text-sm italic">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            <p>Data belum tersedia</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
