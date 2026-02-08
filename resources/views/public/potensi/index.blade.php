@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
    {{-- 1. HERO HEADER --}}
    <x-hero 
        title="Potensi Desa" 
        subtitle="Kekayaan & Unggulan Desa"
        image="https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?q=60&w=1200&auto=format&fit=crop"
        height="h-[400px]"
    >
        Menjelajahi keunggulan ekonomi, pariwisata, hasil bumi, dan produk kreatif UMKM di {{ $profile?->village_name ?? 'Desa' }}.
    </x-hero>

    {{-- BREADCRUMB --}}
    <div class="bg-slate-50 border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8 py-3">
            <nav class="flex text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Potensi Desa</span>
            </nav>
        </div>
    </div>

    {{-- 2. LIST POTENSI --}}
    <div class="bg-gray-50 py-20 min-h-screen relative z-30 -mt-10 pt-10" x-data="{ activeCategory: 'Semua' }">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- FILTER --}}
            @if (isset($categories) && $categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-3 mb-12 animate-fade-in-up">
                    <button @click="activeCategory = 'Semua'"
                        :class="activeCategory === 'Semua' ? 'bg-amber-500 text-white shadow-lg shadow-amber-500/30' :
                            'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-5 py-2 rounded-full font-bold text-sm transition-all duration-300">
                        Semua
                    </button>
                    @foreach ($categories as $cat)
                        <button @click="activeCategory = '{{ $cat }}'"
                            :class="activeCategory === '{{ $cat }}' ?
                                'bg-amber-500 text-white shadow-lg shadow-amber-500/30' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-5 py-2 rounded-full font-bold text-sm transition-all duration-300">
                            {{ ucfirst($cat) }}
                        </button>
                    @endforeach
                </div>
            @endif

            {{-- GRID --}}
            @if (isset($potentials) && $potentials->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up animation-delay-500">
                    @foreach ($potentials as $item)
                        <article x-show="activeCategory === 'Semua' || activeCategory === '{{ $item->category }}'"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full">

                            <div class="relative h-60 overflow-hidden">
                                <div class="absolute inset-0 bg-slate-200 animate-pulse"></div>
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                        <svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                <div class="absolute top-4 left-4 z-10">
                                    <span
                                        class="bg-amber-500/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                                        {{ $item->category ?? 'Unggulan' }}
                                    </span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60">
                                </div>
                            </div>

                            <div class="p-8 flex flex-col flex-1 relative">
                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                </div>
                                <h2
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-amber-600 transition-colors">
                                    <a href="{{ route('public.potentials.show', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed flex-1">
                                    {{ Str::limit(strip_tags($item->description), 100) }}
                                </p>
                                <div class="mt-auto pt-6 border-t border-slate-100">
                                    <a href="{{ route('public.potentials.show', $item->slug) }}"
                                        class="inline-flex items-center text-sm font-bold text-amber-600 hover:text-amber-700 transition group/link">
                                        Lihat Detail
                                        <svg class="w-4 h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="mt-12 flex justify-center">
                    {{ $potentials->links() }}
                </div>
            @else
                <div
                    class="bg-white rounded-[2rem] p-16 text-center shadow-xl shadow-slate-200/50 border border-slate-100 max-w-2xl mx-auto">
                    <div class="text-7xl mb-6">🌾</div>
                    <h3 class="text-2xl font-bold text-slate-700">Belum Ada Data Potensi</h3>
                    <p class="text-slate-500 mt-3">Informasi mengenai potensi desa belum ditambahkan.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
