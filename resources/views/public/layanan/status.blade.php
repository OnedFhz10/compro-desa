@extends('layouts.app')

@section('title', 'Status Layanan')

@section('content')
    <section class="bg-slate-900 pt-32 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-3xl lg:text-5xl font-extrabold text-white mb-4">Cek Status Pengajuan</h1>
            <p class="text-slate-400">Pantau progres permohonan surat Anda secara realtime.</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50 min-h-[50vh]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto">

                {{-- Form Pencarian Ulang --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-10">
                    <form action="{{ route('public.layanan.status') }}" method="GET" class="flex gap-4">
                        <input type="text" name="kode" value="{{ request('kode') }}"
                            placeholder="Masukkan Kode Resi / NIK..."
                            class="flex-1 border border-slate-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                            Cek
                        </button>
                    </form>
                </div>

                {{-- HASIL PENCARIAN --}}
                @if (isset($trackResult))
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl border border-blue-100">
                        <div class="bg-blue-600 p-6 text-white flex justify-between items-center">
                            <div>
                                <span class="text-blue-200 text-xs font-bold uppercase tracking-wider">Jenis Surat</span>
                                <h3 class="text-xl font-bold">{{ $trackResult->letter_type }}</h3>
                            </div>
                            <div class="text-right">
                                <span class="text-blue-200 text-xs font-bold uppercase tracking-wider">Tanggal
                                    Pengajuan</span>
                                <p class="font-medium">
                                    {{ \Carbon\Carbon::parse($trackResult->created_at)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>

                        <div class="p-8">
                            {{-- Timeline Status --}}
                            <div class="relative pl-8 border-l-2 border-slate-200 space-y-8">

                                {{-- Status: Diajukan --}}
                                <div class="relative">
                                    <span
                                        class="absolute -left-[41px] w-5 h-5 rounded-full border-4 border-white {{ $trackResult->status >= 0 ? 'bg-blue-600' : 'bg-slate-300' }}"></span>
                                    <h4 class="font-bold text-slate-800">Permohonan Diterima</h4>
                                    <p class="text-sm text-slate-500">Data pengajuan telah masuk ke sistem desa.</p>
                                </div>

                                {{-- Status: Diproses --}}
                                <div class="relative">
                                    <span
                                        class="absolute -left-[41px] w-5 h-5 rounded-full border-4 border-white {{ $trackResult->status >= 1 ? 'bg-blue-600' : 'bg-slate-300' }}"></span>
                                    <h4
                                        class="font-bold {{ $trackResult->status >= 1 ? 'text-slate-800' : 'text-slate-400' }}">
                                        Sedang Diproses</h4>
                                    <p class="text-sm text-slate-500">Petugas sedang memverifikasi data Anda.</p>
                                </div>

                                {{-- Status: Selesai --}}
                                <div class="relative">
                                    <span
                                        class="absolute -left-[41px] w-5 h-5 rounded-full border-4 border-white {{ $trackResult->status == 2 ? 'bg-green-500' : 'bg-slate-300' }}"></span>
                                    <h4
                                        class="font-bold {{ $trackResult->status == 2 ? 'text-green-600' : 'text-slate-400' }}">
                                        Selesai / Siap Diambil</h4>
                                    <p class="text-sm text-slate-500">
                                        {{ $trackResult->status == 2 ? 'Silakan datang ke kantor desa untuk mengambil surat.' : 'Menunggu proses selesai.' }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                @elseif(request('kode'))
                    {{-- JIKA DATA TIDAK DITEMUKAN --}}
                    <div class="text-center py-10">
                        <div class="text-6xl mb-4">📂</div>
                        <h3 class="text-xl font-bold text-slate-700">Data Tidak Ditemukan</h3>
                        <p class="text-slate-500">Kode resi atau NIK yang Anda masukkan tidak terdaftar.</p>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
