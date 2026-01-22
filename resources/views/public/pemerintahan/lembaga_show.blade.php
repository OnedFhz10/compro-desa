@extends('layouts.app')

@section('title', $pageTitle)

@section('content')

    {{-- HEADER --}}
    <div class="relative bg-slate-900 py-24 overflow-hidden">
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600 rounded-full blur-[150px] opacity-20 translate-x-1/2 -translate-y-1/2">
        </div>

        <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-white/10 text-white border border-white/20 text-xs font-bold tracking-widest mb-4 backdrop-blur-sm">
                LEMBAGA DESA
            </span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white mb-6">
                {{ $institution->name ?? $pageTitle }}
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Mitra pemerintah desa dalam memberdayakan masyarakat dan pembangunan wilayah.
            </p>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="bg-white py-16 min-h-[500px]">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($institution)
                {{-- JIKA DATA ADA DI DATABASE --}}
                <div class="flex flex-col lg:flex-row gap-12 items-start">

                    {{-- Logo / Gambar --}}
                    <div class="w-full lg:w-1/3">
                        <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 shadow-lg text-center">
                            @if ($institution->image_path)
                                <img src="{{ asset('storage/' . $institution->image_path) }}"
                                    class="w-48 h-48 mx-auto object-contain mb-6">
                            @else
                                <div
                                    class="w-48 h-48 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-blue-500 text-4xl mb-6">
                                    🏢
                                </div>
                            @endif
                            <h2 class="font-bold text-xl text-slate-900 mb-1">{{ $institution->name }}</h2>
                            <span
                                class="text-blue-600 font-bold text-sm bg-blue-50 px-3 py-1 rounded-full">{{ $institution->abbreviation ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="w-full lg:w-2/3">
                        <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed">
                            <h3 class="font-bold text-slate-900">Tentang Lembaga</h3>
                            <p>{{ $institution->description }}</p>
                        </div>

                        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                                <h4 class="font-bold text-blue-900 mb-2">Peran & Fungsi</h4>
                                <p class="text-sm text-blue-800">Membantu pemerintah desa dalam pelaksanaan pembangunan dan
                                    pemberdayaan masyarakat.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-100">
                                <h4 class="font-bold text-emerald-900 mb-2">Status</h4>
                                <p class="text-sm text-emerald-800 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- JIKA DATA BELUM ADA --}}
                <div class="max-w-3xl mx-auto text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                        📝
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Informasi Belum Tersedia</h2>
                    <p class="text-slate-500 mb-8 leading-relaxed">
                        Mohon maaf, data lengkap mengenai <strong>{{ $pageTitle }}</strong> sedang dalam proses
                        penyusunan oleh admin desa.
                    </p>
                    <a href="{{ route('public.institutions') }}"
                        class="inline-block bg-slate-900 text-white px-8 py-3 rounded-full font-bold hover:bg-slate-800 transition">
                        Lihat Lembaga Lainnya
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
