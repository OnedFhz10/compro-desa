@extends('layouts.app')

@section('title', 'Perangkat Desa')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=2940&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Pemerintahan</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up animation-delay-200">
                Perangkat Desa
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up animation-delay-400">
                Jajaran aparatur yang siap melayani masyarakat {{ $profile?->village_name ?? 'Desa' }} dengan sepenuh hati.
            </p>
        </div>
    </section>

    {{-- 2. CONTENT LIST PERANGKAT --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20 relative z-30 -mt-20">
        @if ($officials->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($officials as $official)
                    <div
                        class="group bg-white rounded-3xl shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden animate-fade-in-up">

                        {{-- Foto --}}
                        <div class="relative h-72 overflow-hidden bg-slate-100">
                            {{-- PERBAIKAN: Gunakan $official->image_path --}}
                            @if ($official->image_path)
                                <img src="{{ asset('storage/' . $official->image_path) }}" alt="{{ $official->name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($official->name) }}&background=random&size=256"
                                    class="w-full h-full object-cover">
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80">
                            </div>

                            {{-- Teks di atas foto (posisi bawah) --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <h3 class="text-xl font-bold leading-tight mb-1">{{ $official->name }}</h3>
                                <p class="text-blue-300 font-medium text-sm uppercase tracking-wide">
                                    {{ $official->position }}
                                </p>
                            </div>
                        </div>

                        {{-- Info Tambahan (NIP/Telp jika ada) --}}
                        @if ($official->nip || $official->phone)
                            <div class="p-4 bg-white border-t border-slate-100">
                                @if ($official->nip)
                                    <p class="text-xs text-slate-500 font-mono text-center">NIP: {{ $official->nip }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center shadow-lg">
                <p class="text-slate-500 text-lg">Data perangkat desa belum tersedia.</p>
            </div>
        @endif
    </div>
@endsection
