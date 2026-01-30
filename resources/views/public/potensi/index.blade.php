@extends('layouts.app')

@section('title', $pageTitle ?? 'Potensi Desa')
@section('meta_description', $pageDescription ?? 'Jelajahi potensi wisata, produk unggulan, dan UMKM desa kami.')

@section('content')
    {{-- HEADER --}}
    <section class="bg-slate-900 py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="text-emerald-400 font-bold tracking-widest text-sm uppercase mb-3 block">Kekayaan Lokal</span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-6">
                {{ $pageTitle ?? 'Potensi & Wisata Desa' }}
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                {{ $pageDescription ?? 'Temukan pesona alam, produk kreatif, dan semangat wirausaha warga desa.' }}
            </p>
        </div>
    </section>

    {{-- LIST POTENSI --}}
    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- Filter Tabs --}}
            <div class="flex justify-center mb-12 gap-2 flex-wrap">
                <a href="{{ route('public.potentials') }}"
                    class="px-6 py-2 rounded-full text-sm font-bold transition {{ request()->routeIs('public.potentials') ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-gray-100' }}">Semua</a>
                <a href="{{ route('public.potentials.category', 'wisata') }}"
                    class="px-6 py-2 rounded-full text-sm font-bold transition {{ request()->is('*wisata*') ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-gray-100' }}">Wisata</a>
                <a href="{{ route('public.potentials.category', 'umkm') }}"
                    class="px-6 py-2 rounded-full text-sm font-bold transition {{ request()->is('*umkm*') ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-gray-100' }}">UMKM</a>
                <a href="{{ route('public.potentials.category', 'produk') }}"
                    class="px-6 py-2 rounded-full text-sm font-bold transition {{ request()->is('*produk*') ? 'bg-emerald-600 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-gray-100' }}">Produk</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($potentials as $item)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-lg shadow-slate-200/50 border border-gray-100 hover:-translate-y-2 transition duration-300 group">
                        <div class="relative h-64 overflow-hidden">
                            {{-- PERBAIKAN: Gunakan $item->image --}}
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <div
                                    class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 font-bold">
                                    No Image
                                </div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                                <span class="text-white text-sm">{{ Str::limit($item->description, 100) }}</span>
                            </div>
                            <span
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur text-emerald-700 text-xs font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-wide">
                                {{ $item->category }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $item->title }}</h3>
                            <p class="text-slate-500 text-sm line-clamp-2">{{ $item->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <div class="text-6xl mb-4">🌳</div>
                        <h3 class="text-xl font-bold text-slate-600">Belum ada data potensi</h3>
                        <p class="text-slate-400">Silakan kembali lagi nanti.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $potentials->links() }}
            </div>
        </div>
    </section>
@endsection
