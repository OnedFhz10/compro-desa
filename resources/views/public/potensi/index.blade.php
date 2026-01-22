@extends('layouts.app')

@section('title', $pageTitle)

@section('content')

    {{-- 1. HERO HEADER DINAMIS --}}
    <div class="relative bg-slate-900 py-24 lg:py-32 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2940&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-900 z-10"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-xs font-bold tracking-widest mb-4 backdrop-blur-sm uppercase">
                {{ isset($slug) ? ucfirst($slug) : 'Potensi Desa' }}
            </span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-2xl">
                {{ $pageTitle }}
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto leading-relaxed">
                {{ $pageDescription }}
            </p>
        </div>
    </div>

    {{-- 2. LIST KONTEN --}}
    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- Tombol Filter Navigasi (Agar user mudah pindah kategori) --}}
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <a href="{{ route('public.potentials') }}"
                    class="px-6 py-2 rounded-full font-bold text-sm transition {{ request()->routeIs('public.potentials') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/30' : 'bg-white text-slate-600 border border-gray-200 hover:border-emerald-400 hover:text-emerald-600' }}">
                    Semua
                </a>
                <a href="{{ route('public.potentials.category', 'wisata') }}"
                    class="px-6 py-2 rounded-full font-bold text-sm transition {{ request()->is('potensi/kategori/wisata') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/30' : 'bg-white text-slate-600 border border-gray-200 hover:border-emerald-400 hover:text-emerald-600' }}">
                    Wisata
                </a>
                <a href="{{ route('public.potentials.category', 'umkm') }}"
                    class="px-6 py-2 rounded-full font-bold text-sm transition {{ request()->is('potensi/kategori/umkm') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/30' : 'bg-white text-slate-600 border border-gray-200 hover:border-emerald-400 hover:text-emerald-600' }}">
                    UMKM
                </a>
                <a href="{{ route('public.potentials.category', 'produk') }}"
                    class="px-6 py-2 rounded-full font-bold text-sm transition {{ request()->is('potensi/kategori/produk') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/30' : 'bg-white text-slate-600 border border-gray-200 hover:border-emerald-400 hover:text-emerald-600' }}">
                    Produk
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($potentials as $item)
                    <div
                        class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 border border-gray-100 flex flex-col">

                        {{-- Image Area --}}
                        <div class="relative h-72 overflow-hidden">
                            {{-- Badge Kategori --}}
                            <span
                                class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-700 text-xs font-extrabold px-3 py-1.5 rounded-lg shadow-sm uppercase tracking-wide">
                                {{ $item->category }}
                            </span>

                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <div
                                    class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 font-bold">
                                    No Image</div>
                            @endif

                            {{-- Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                            </div>
                        </div>

                        {{-- Content Area --}}
                        <div class="p-8 relative">
                            <h3 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-emerald-600 transition">
                                {{ $item->title }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6">
                                {{ $item->description }}
                            </p>

                            {{-- Info Tambahan (Opsional: Owner/Lokasi jika ada di DB) --}}
                            <div class="pt-6 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">Lihat Detail</span>
                                <button
                                    class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                        <span class="text-6xl mb-4 block">🌾</span>
                        <h3 class="text-xl font-bold text-slate-600 mb-2">Belum ada data {{ $pageTitle }}</h3>
                        <p class="text-slate-500">Silakan tambahkan data melalui panel admin.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $potentials->links() }}
            </div>

        </div>
    </div>

@endsection
