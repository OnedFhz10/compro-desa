@extends('layouts.app')

@section('title', 'Cek Status Surat')

@section('content')
    {{-- 1. HERO HEADER --}}
    {{-- 1. HERO HEADER --}}
    <x-hero 
        title="Lacak Pengajuan Surat" 
        subtitle="Layanan Mandiri"
        image="https://images.unsplash.com/photo-1555421689-d68471e189f2?q=60&w=1200&auto=format&fit=crop"
    >
        Pantau proses administrasi surat anda secara realtime cukup dengan Kode Resi atau NIK.
    </x-hero>

    {{-- 2. MAIN CONTENT --}}
    <div class="bg-gray-50 py-16 min-h-screen relative z-30 -mt-12">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="max-w-3xl mx-auto">

                {{-- SEARCH CARD --}}
                <div
                    class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-slate-100 animate-fade-in-up">
                    <form action="{{ route('public.services.status') }}" method="GET"
                        class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="kode" value="{{ $keyword ?? '' }}"
                                placeholder="Masukkan Kode Resi atau NIK..."
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition text-slate-700 font-medium placeholder:text-slate-400"
                                required>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition shadow-lg shadow-blue-600/30">
                            Cek Status
                        </button>
                    </form>
                </div>

                {{-- RESULT SECTION --}}
                @if (isset($result))
                    <div class="mt-8 animate-fade-in-up animation-delay-200">
                        <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100">

                            {{-- Header Status --}}
                            <div
                                class="px-8 py-6 bg-slate-50 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div>
                                    <p class="text-sm text-slate-500 font-bold uppercase tracking-wider">Kode Resi</p>
                                    <p class="text-2xl font-mono font-bold text-slate-800 tracking-wider">
                                        {{ $result->track_code ?? '-' }}</p>
                                </div>

                                {{-- Badge Status Logic --}}
                                @php
                                    $statusColor = match ($result->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                        'proses' => 'bg-blue-100 text-blue-700 border-blue-200',
                                        'selesai' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                        'ditolak' => 'bg-red-100 text-red-700 border-red-200',
                                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                                    };

                                    $statusLabel = ucfirst($result->status);
                                @endphp

                                <span
                                    class="px-6 py-2 rounded-full font-bold text-sm border {{ $statusColor }} flex items-center gap-2">
                                    <span
                                        class="w-2.5 h-2.5 rounded-full {{ str_replace(['bg-', 'text-', 'border-'], 'bg-', $statusColor) }} opacity-75 animate-pulse"></span>
                                    {{ $statusLabel }}
                                </span>
                            </div>

                            <div class="p-8">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    {{-- Data Pemohon --}}
                                    <div>
                                        <h4 class="text-slate-900 font-bold mb-4 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            Detail Pemohon
                                        </h4>
                                        <ul class="space-y-3">
                                            <li class="flex flex-col">
                                                <span class="text-xs text-slate-400 uppercase font-bold">Nama Lengkap</span>
                                                <span class="text-slate-700 font-medium">{{ $result->name }}</span>
                                            </li>
                                            <li class="flex flex-col">
                                                <span class="text-xs text-slate-400 uppercase font-bold">NIK</span>
                                                <span
                                                    class="text-slate-700 font-medium">{{ substr($result->nik, 0, 10) }}******</span>
                                            </li>
                                            <li class="flex flex-col">
                                                <span class="text-xs text-slate-400 uppercase font-bold">Jenis Surat</span>
                                                <span
                                                    class="text-slate-700 font-medium bg-blue-50 px-3 py-1 rounded-lg self-start mt-1 border border-blue-100 text-sm">
                                                    {{ $result->letter_type ?? 'Surat Keterangan' }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- Catatan & Timeline --}}
                                    <div>
                                        <h4 class="text-slate-900 font-bold mb-4 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                </path>
                                            </svg>
                                            Informasi Proses
                                        </h4>
                                        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                                            <div class="mb-4">
                                                <span class="text-xs text-slate-400 uppercase font-bold block mb-1">Tanggal
                                                    Pengajuan</span>
                                                <span class="text-slate-700 font-medium">
                                                    {{ \Carbon\Carbon::parse($result->created_at)->translatedFormat('l, d F Y H:i') }}
                                                </span>
                                            </div>

                                            <div>
                                                <span class="text-xs text-slate-400 uppercase font-bold block mb-1">Catatan
                                                    Admin</span>
                                                @if ($result->admin_note)
                                                    <p
                                                        class="text-sm text-slate-600 italic bg-white p-3 rounded-lg border border-slate-200">
                                                        "{{ $result->admin_note }}"
                                                    </p>
                                                @else
                                                    <p class="text-sm text-slate-400 italic">Belum ada catatan.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Button Jika Selesai --}}
                                @if ($result->status == 'selesai' && $result->file_path)
                                    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                                        <a href="{{ asset('storage/' . $result->file_path) }}" target="_blank"
                                            class="inline-flex items-center gap-2 bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                            Download Surat Digital
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @elseif(isset($keyword))
                    {{-- NOT FOUND STATE --}}
                    <div class="mt-8 animate-fade-in-up">
                        <div class="bg-white rounded-3xl p-10 text-center shadow-lg border border-slate-100">
                            <div
                                class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6 text-red-500">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Data Tidak Ditemukan</h3>
                            <p class="text-slate-500 max-w-md mx-auto">
                                Maaf, kami tidak menemukan pengajuan dengan kode resi atau NIK <span
                                    class="font-mono font-bold text-slate-700 bg-slate-100 px-2 py-0.5 rounded">"{{ $keyword }}"</span>.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('public.services.mail.index') }}"
                                    class="text-blue-600 font-bold hover:underline">Buat Pengajuan Baru &rarr;</a>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- EMPTY STATE (INITIAL) --}}
                    <div class="mt-12 text-center opacity-60">
                        <p class="text-slate-400">Silakan masukkan kode resi yang anda dapatkan saat mengajukan surat.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
