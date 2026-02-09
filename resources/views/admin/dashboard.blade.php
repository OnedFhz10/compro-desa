@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- WELCOME SECTION --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋</h1>
            <p class="text-gray-400 mt-1">Berikut adalah ringkasan aktivitas di desa digital Anda hari ini.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <div class="bg-gray-800/80 backdrop-blur border border-gray-700 px-4 py-2 rounded-xl text-sm text-gray-300 flex items-center shadow-sm">
                <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>
    </div>

    {{-- STATISTIK KARTU --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Berita --}}
        <div class="group bg-gradient-to-br from-gray-800 to-gray-800 border border-gray-700 hover:border-blue-500/50 rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-blue-500/10 hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Total Berita</p>
                    <h3 class="text-3xl font-bold text-white">{{ $stats['total_posts'] }}</h3>
                     <span class="text-xs font-medium text-blue-500 bg-blue-500/10 px-2 py-0.5 rounded mt-2 inline-block">Terpublikasi</span>
                </div>
                <div class="p-3 bg-gray-700/50 rounded-xl text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
            </div>
        </div>

        {{-- Total Potensi --}}
        <div class="group bg-gradient-to-br from-gray-800 to-gray-800 border border-gray-700 hover:border-green-500/50 rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-green-500/10 hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-green-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Potensi Desa</p>
                    <h3 class="text-3xl font-bold text-white">{{ $stats['total_potentials'] }}</h3>
                    <span class="text-xs font-medium text-green-500 bg-green-500/10 px-2 py-0.5 rounded mt-2 inline-block">Item</span>
                </div>
                <div class="p-3 bg-gray-700/50 rounded-xl text-green-500 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
        </div>

        {{-- Perangkat Desa --}}
        <div class="group bg-gradient-to-br from-gray-800 to-gray-800 border border-gray-700 hover:border-purple-500/50 rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-purple-500/10 hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Perangkat Desa</p>
                    <h3 class="text-3xl font-bold text-white">{{ $stats['total_officials'] }}</h3>
                    <span class="text-xs font-medium text-purple-500 bg-purple-500/10 px-2 py-0.5 rounded mt-2 inline-block">Personil</span>
                </div>
                <div class="p-3 bg-gray-700/50 rounded-xl text-purple-500 group-hover:bg-purple-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
        </div>

        {{-- Galeri --}}
        <div class="group bg-gradient-to-br from-gray-800 to-gray-800 border border-gray-700 hover:border-pink-500/50 rounded-2xl p-6 shadow-lg transition-all duration-300 hover:shadow-pink-500/10 hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-pink-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Galeri Foto</p>
                    <h3 class="text-3xl font-bold text-white">{{ $stats['total_galleries'] }}</h3>
                    <span class="text-xs font-medium text-pink-500 bg-pink-500/10 px-2 py-0.5 rounded mt-2 inline-block">Album</span>
                </div>
                <div class="p-3 bg-gray-700/50 rounded-xl text-pink-500 group-hover:bg-pink-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        {{-- Quick Actions --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
                <h3 class="text-lg font-bold text-white mb-4">Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center p-3 bg-gray-700/50 hover:bg-gray-700 rounded-lg transition group border border-transparent hover:border-gray-600">
                        <div class="p-2 bg-blue-500/20 text-blue-400 rounded-lg mr-3 group-hover:bg-blue-500 group-hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-sm font-medium text-white group-hover:text-blue-400 transition-colors">Tulis Berita Baru</span>
                            <span class="block text-xs text-gray-400">Publikasikan informasi desa</span>
                        </div>
                    </a>
                     <a href="{{ route('admin.potentials.create') }}" class="flex items-center p-3 bg-gray-700/50 hover:bg-gray-700 rounded-lg transition group border border-transparent hover:border-gray-600">
                        <div class="p-2 bg-green-500/20 text-green-400 rounded-lg mr-3 group-hover:bg-green-500 group-hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-sm font-medium text-white group-hover:text-green-400 transition-colors">Tambah Potensi</span>
                            <span class="block text-xs text-gray-400">Promosikan potensi desa</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- BERITA TERBARU --}}
        <div class="lg:col-span-2 bg-gray-800 rounded-xl shadow-lg border border-gray-700 flex flex-col">
            <div class="p-6 border-b border-gray-700">
                <h3 class="text-lg font-bold text-white">Berita Terakhir Diterbitkan</h3>
            </div>
            <div class="p-6 flex-1">
                <div class="space-y-4">
                    @forelse($recentPosts as $post)
                        <div class="flex gap-4 p-3 bg-gray-700/30 rounded-lg hover:bg-gray-700/60 transition border border-gray-700/50 group">
                            <div class="w-16 h-16 bg-gray-600 rounded-lg flex-shrink-0 overflow-hidden relative">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-500 bg-gray-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-white font-medium text-sm line-clamp-1 group-hover:text-blue-400 transition">{{ $post->title }}</h4>
                                <div class="flex items-center mt-2 space-x-2">
                                    <x-ui.badge color="gray" class="text-[10px] px-1.5 py-0.5">{{ $post->category->name ?? 'Umum' }}</x-ui.badge>
                                    <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                             <p class="text-gray-500 text-sm">Belum ada berita.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="p-4 border-t border-gray-700 bg-gray-800/50 rounded-b-xl text-center">
                <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center text-sm font-medium text-blue-400 hover:text-blue-300 transition">
                    Kelola Berita
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
@endsection
