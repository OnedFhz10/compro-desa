@extends('layouts.app')
@section('title', 'Cek Status Layanan')
@section('content')

    <div class="bg-slate-900 py-20 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-2">Cek Status Pengajuan</h1>
        <p class="text-slate-300">Pantau progres permohonan surat atau pengaduan Anda.</p>
    </div>

    <div class="container mx-auto px-4 py-16 min-h-[50vh]">

        {{-- Search Box --}}
        <div class="max-w-xl mx-auto mb-12">
            <form action="{{ route('public.layanan.status') }}" method="GET" class="relative">
                <input type="text" name="kode" value="{{ $search }}"
                    class="w-full bg-white border-2 border-gray-200 rounded-full px-6 py-4 pr-32 focus:outline-none focus:border-blue-500 shadow-sm text-lg"
                    placeholder="Masukkan Kode Resi / Tiket..." required>
                <button type="submit"
                    class="absolute right-2 top-2 bottom-2 bg-blue-600 text-white px-6 rounded-full font-bold hover:bg-blue-700 transition">
                    Lacak
                </button>
            </form>
            @if (session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-xl border border-green-200 text-center font-bold">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        {{-- HASIL PENCARIAN --}}
        @if ($search)
            <div class="max-w-2xl mx-auto">
                @if ($resultSurat)
                    <div class="bg-white p-8 rounded-3xl shadow-xl border-l-8 border-blue-500">
                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase mb-4 inline-block">Permohonan
                            Surat</span>
                        <h3 class="text-2xl font-bold text-slate-800 mb-1">{{ $resultSurat->letter_type }}</h3>
                        <p class="text-slate-500 mb-6">Kode: <span
                                class="font-mono font-bold text-slate-800">{{ $resultSurat->tracking_code }}</span></p>

                        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-xl">
                            <span class="text-sm font-bold text-slate-600">Status Saat Ini:</span>
                            @if ($resultSurat->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg font-bold">Menunggu
                                    Verifikasi</span>
                            @elseif($resultSurat->status == 'proses')
                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-bold animate-pulse">Sedang
                                    Diproses</span>
                            @elseif($resultSurat->status == 'selesai')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-bold">Selesai / Dapat
                                    Diambil</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-bold">Ditolak</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-400 mt-4 text-center">Silakan datang ke kantor desa jika status sudah
                            Selesai.</p>
                    </div>
                @elseif($resultAduan)
                    <div class="bg-white p-8 rounded-3xl shadow-xl border-l-8 border-orange-500">
                        <span
                            class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold uppercase mb-4 inline-block">Laporan
                            Pengaduan</span>
                        <h3 class="text-2xl font-bold text-slate-800 mb-1">{{ $resultAduan->category }}</h3>
                        <p class="text-slate-500 mb-6">Kode: <span
                                class="font-mono font-bold text-slate-800">{{ $resultAduan->ticket_code }}</span></p>

                        <div class="mb-4">
                            <h4 class="font-bold text-sm text-slate-700">Isi Laporan:</h4>
                            <p class="text-slate-600 italic">"{{ $resultAduan->description }}"</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-xl">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-bold text-slate-600">Status:</span>
                                @if ($resultAduan->status == 'pending')
                                    <span class="text-yellow-600 font-bold">Diterima</span>
                                @elseif($resultAduan->status == 'proses')
                                    <span class="text-blue-600 font-bold">Sedang Ditindaklanjuti</span>
                                @else
                                    <span class="text-green-600 font-bold">Selesai Ditangani</span>
                                @endif
                            </div>
                            @if ($resultAduan->admin_response)
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <span class="text-xs font-bold text-slate-400 uppercase">Tanggapan Admin:</span>
                                    <p class="text-slate-800 font-medium mt-1">{{ $resultAduan->admin_response }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="text-center py-10 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-300">
                        <span class="text-4xl block mb-2">🔍</span>
                        <h3 class="font-bold text-slate-600">Data Tidak Ditemukan</h3>
                        <p class="text-slate-500">Periksa kembali Kode Resi atau Kode Tiket Anda.</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
