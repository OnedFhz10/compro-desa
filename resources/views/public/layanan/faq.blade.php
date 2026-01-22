@extends('layouts.app')
@section('title', 'FAQ - Tanya Jawab')
@section('content')

    <div class="bg-slate-900 py-20 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-2">FAQ</h1>
        <p class="text-slate-300">Pertanyaan yang sering diajukan oleh warga.</p>
    </div>

    <div class="container mx-auto px-4 py-16 max-w-3xl">
        <div class="space-y-4">
            {{-- Jika data kosong, tampilkan contoh statis --}}
            @forelse($faqs as $faq)
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <button @click="open = !open"
                        class="w-full text-left px-6 py-4 flex justify-between items-center bg-white hover:bg-gray-50 transition">
                        <span class="font-bold text-slate-800">{{ $faq->question }}</span>
                        <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-cloak
                        class="px-6 pb-6 pt-2 text-slate-600 leading-relaxed border-t border-gray-100">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            @empty
                {{-- DATA DUMMY JIKA DATABASE KOSONG --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-sm border border-gray-200">
                    <button @click="open = !open"
                        class="w-full text-left px-6 py-4 flex justify-between items-center font-bold text-slate-800">
                        Apa syarat membuat SKTM?
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-6 pb-4 text-slate-600">
                        Membawa Fotokopi KK dan KTP, serta surat pengantar dari RT/RW setempat.
                    </div>
                </div>
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-sm border border-gray-200">
                    <button @click="open = !open"
                        class="w-full text-left px-6 py-4 flex justify-between items-center font-bold text-slate-800">
                        Berapa lama proses pembuatan KTP?
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-6 pb-4 text-slate-600">
                        Proses pencetakan KTP dilakukan di Kecamatan/Disdukcapil. Desa hanya memberikan surat pengantar.
                        Biasanya memakan waktu 3-7 hari kerja.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
