@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Grid Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- Card 1: Surat Masuk --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 border-l-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-400 mb-1">Surat Perlu Diproses</p>
                <p class="text-3xl font-bold text-white">{{ $stats['pending_letters'] ?? 0 }}</p>
            </div>
            <div class="p-3 bg-blue-900/50 rounded-full text-blue-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Card 2: Berita --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 border-l-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-400 mb-1">Total Berita</p>
                <p class="text-3xl font-bold text-white">{{ $stats['total_posts'] }}</p>
            </div>
            <div class="p-3 bg-green-900/50 rounded-full text-green-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Card 3: Potensi --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 border-l-4 border-yellow-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-400 mb-1">Potensi Desa</p>
                <p class="text-3xl font-bold text-white">{{ $stats['total_potentials'] }}</p>
            </div>
            <div class="p-3 bg-yellow-900/50 rounded-full text-yellow-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Card 4: Perangkat --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 border-l-4 border-purple-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-400 mb-1">Perangkat Desa</p>
                <p class="text-3xl font-bold text-white">{{ $stats['total_officials'] }}</p>
            </div>
            <div class="p-3 bg-purple-900/50 rounded-full text-purple-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Kolom Kiri: Permohonan Surat Terbaru --}}
        <div class="bg-gray-800 rounded-lg shadow-lg border border-gray-700">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <h3 class="font-bold text-gray-100">Permohonan Surat Terbaru</h3>
                <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Lihat Semua</a>
            </div>
            <div class="p-4">
                @if (isset($recentLetters) && count($recentLetters) > 0)
                    <ul class="divide-y divide-gray-700">
                        @foreach ($recentLetters as $letter)
                            <li class="py-3 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-semibold text-gray-200">
                                        {{ $letter->jenis_surat ?? 'Surat Keterangan' }}</p>
                                    <p class="text-xs text-gray-400">Pemohon:
                                        {{ $letter->nama_pemohon ?? ($letter->user->name ?? 'Warga') }}</p>
                                    <p class="text-xs text-gray-500">{{ $letter->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    @if ($letter->status == 'pending')
                                        <span
                                            class="px-2 py-1 text-xs font-semibold text-yellow-300 bg-yellow-900/50 rounded-full border border-yellow-700">Pending</span>
                                    @elseif($letter->status == 'diproses')
                                        <span
                                            class="px-2 py-1 text-xs font-semibold text-blue-300 bg-blue-900/50 rounded-full border border-blue-700">Diproses</span>
                                    @elseif($letter->status == 'selesai')
                                        <span
                                            class="px-2 py-1 text-xs font-semibold text-green-300 bg-green-900/50 rounded-full border border-green-700">Selesai</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 italic text-center py-4">Belum ada permohonan surat.</p>
                @endif
            </div>
        </div>

        {{-- Kolom Kanan: Berita Terbaru --}}
        <div class="bg-gray-800 rounded-lg shadow-lg border border-gray-700">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <h3 class="font-bold text-gray-100">Berita Terakhir Diposting</h3>
                <a href="{{ route('admin.posts.index') }}" class="text-sm text-blue-400 hover:text-blue-300">Kelola
                    Berita</a>
            </div>
            <div class="p-4">
                @if ($recentPosts->count() > 0)
                    <ul class="divide-y divide-gray-700">
                        @foreach ($recentPosts as $post)
                            <li class="py-3 flex gap-3">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        class="w-12 h-12 object-cover rounded border border-gray-600" alt="Thumb">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gray-700 rounded flex items-center justify-center text-gray-400 text-xs border border-gray-600">
                                        No Pic</div>
                                @endif
                                <div>
                                    <p class="text-sm font-semibold text-gray-200 line-clamp-1">{{ $post->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $post->category->name ?? 'Umum' }} •
                                        {{ $post->created_at->format('d M Y') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 italic text-center py-4">Belum ada berita.</p>
                @endif
            </div>
        </div>
    </div>

@endsection
