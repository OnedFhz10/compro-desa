@extends('layouts.app')

@section('title', 'Lembaga Desa')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=2968&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Kemasyarakatan</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Lembaga Desa
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Mitra strategis pemerintah dalam pembangunan dan pemberdayaan masyarakat.
            </p>
        </div>
    </section>

    {{-- 2. CONTENT GRID --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($institutions as $item)
                <a href="{{ route('public.institution.show', Str::slug($item->name)) }}"
                    class="group bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-transparent hover:border-blue-200 flex flex-col items-center text-center animate-fade-in-up">

                    {{-- Logo --}}
                    <div
                        class="w-24 h-24 mb-6 rounded-2xl bg-slate-50 p-4 border border-slate-100 group-hover:bg-blue-50 group-hover:border-blue-100 transition-colors">
                        {{-- PERBAIKAN: Gunakan $item->image_path --}}
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-full h-full text-slate-300 group-hover:text-blue-400 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $item->name }}
                    </h3>

                    <p class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed">
                        {{ $item->description ?? 'Lembaga desa yang aktif berperan dalam kemajuan masyarakat.' }}
                    </p>

                    <div class="mt-auto w-full">
                        <span
                            class="inline-flex items-center justify-center w-full py-3 px-4 rounded-xl bg-slate-50 text-slate-600 font-semibold text-sm group-hover:bg-blue-600 group-hover:text-white transition-all">
                            Lihat Detail
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-full bg-white rounded-3xl p-12 text-center shadow-lg">
                    <p class="text-slate-500">Belum ada data lembaga desa.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
