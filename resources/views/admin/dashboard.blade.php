@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- STATISTIK KARTU --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Surat Pending --}}
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Permohonan Surat</p>
                    <h3 class="text-2xl font-bold text-white">{{ $stats['pending_letters'] }} <span
                            class="text-sm font-normal text-yellow-500">Pending</span></h3>
                </div>
                <div class="p-3 bg-gray-700 rounded-lg text-yellow-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Berita --}}
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Berita</p>
                    <h3 class="text-2xl font-bold text-white">{{ $stats['total_posts'] }}</h3>
                </div>
                <div class="p-3 bg-gray-700 rounded-lg text-blue-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Potensi --}}
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Potensi Desa</p>
                    <h3 class="text-2xl font-bold text-white">{{ $stats['total_potentials'] }}</h3>
                </div>
                <div class="p-3 bg-gray-700 rounded-lg text-green-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Perangkat Desa --}}
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Perangkat Desa</p>
                    <h3 class="text-2xl font-bold text-white">{{ $stats['total_officials'] }}</h3>
                </div>
                <div class="p-3 bg-gray-700 rounded-lg text-purple-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- DAFTAR SURAT TERBARU --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-bold text-white mb-4">Permohonan Surat Terbaru</h3>
            <div class="space-y-4">
                @forelse($recentLetters as $letter)
                    <div class="flex items-center justify-between p-3 bg-gray-700/50 rounded-lg">
                        <div>
                            <p class="text-white font-medium">{{ $letter->name }}</p>
                            <p class="text-xs text-gray-400">{{ $letter->letter_type }}</p>
                        </div>
                        <div>
                            @if ($letter->status == 'pending')
                                <span class="px-2 py-1 text-xs bg-yellow-900 text-yellow-300 rounded">Pending</span>
                            @elseif($letter->status == 'diproses')
                                <span class="px-2 py-1 text-xs bg-blue-900 text-blue-300 rounded">Proses</span>
                            @elseif($letter->status == 'selesai')
                                <span class="px-2 py-1 text-xs bg-green-900 text-green-300 rounded">Selesai</span>
                            @else
                                <span class="px-2 py-1 text-xs bg-red-900 text-red-300 rounded">Ditolak</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm text-center">Belum ada permohonan surat.</p>
                @endforelse
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('admin.letters.index') }}" class="text-sm text-blue-400 hover:text-blue-300">Lihat Semua
                    Permohonan &rarr;</a>
            </div>
        </div>

        {{-- BERITA TERBARU --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-bold text-white mb-4">Berita Terakhir Diterbitkan</h3>
            <div class="space-y-4">
                @forelse($recentPosts as $post)
                    <div class="flex gap-4 p-3 bg-gray-700/50 rounded-lg">
                        <div class="w-16 h-16 bg-gray-600 rounded flex-shrink-0 overflow-hidden">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div>
                            <h4 class="text-white font-medium text-sm line-clamp-1">{{ $post->title }}</h4>
                            <p class="text-xs text-gray-400 mt-1">{{ $post->category->name ?? '-' }} •
                                {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm text-center">Belum ada berita.</p>
                @endforelse
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('admin.posts.index') }}" class="text-sm text-blue-400 hover:text-blue-300">Kelola Berita
                    &rarr;</a>
            </div>
        </div>
    </div>
@endsection
