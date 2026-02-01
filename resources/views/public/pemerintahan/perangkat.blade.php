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
    <div class="bg-gray-50 py-20 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($officials->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($officials as $official)
                        <div
                            class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 flex flex-col items-center text-center relative overflow-hidden animate-fade-in-up">

                            {{-- Dekorasi Background Atas (Agar terlihat modern) --}}
                            <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-blue-50 to-transparent">
                            </div>

                            {{-- FOTO BULAT (LINGKARAN) --}}
                            <div class="relative z-10 mb-6">
                                <div
                                    class="w-40 h-40 rounded-full p-1.5 bg-white shadow-md border border-slate-200 group-hover:scale-105 transition-transform duration-300">
                                    <div class="w-full h-full rounded-full overflow-hidden relative">
                                        {{-- LOGIKA GAMBAR (Sesuai kode asli Anda) --}}
                                        @if ($official->image_path)
                                            <img src="{{ asset('storage/' . $official->image_path) }}"
                                                alt="{{ $official->name }}" class="w-full h-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($official->name) }}&background=random&size=256"
                                                alt="{{ $official->name }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- INFORMASI TEXT --}}
                            <div class="relative z-10 w-full">
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                    {{ $official->name }}
                                </h3>
                                <p class="text-blue-500 font-bold text-xs uppercase tracking-widest mb-4">
                                    {{ $official->position }}
                                </p>

                                {{-- Garis Pembatas Kecil --}}
                                <div class="w-10 h-1 bg-slate-200 mx-auto mb-4 rounded-full"></div>

                                {{-- NIP / Kontak --}}
                                @if ($official->nip)
                                    <span
                                        class="inline-block px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-mono rounded-full border border-slate-200">
                                        NIP: {{ $official->nip }}
                                    </span>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 text-center shadow-lg border border-slate-100">
                    <div class="text-6xl mb-4">👥</div>
                    <h3 class="text-xl font-bold text-slate-700">Data Belum Tersedia</h3>
                    <p class="text-slate-500 mt-2">Daftar perangkat desa belum ditambahkan oleh admin.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
