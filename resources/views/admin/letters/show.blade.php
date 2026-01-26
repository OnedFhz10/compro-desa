@extends('layouts.admin')

@section('title', 'Detail Permohonan')

@section('content')

    <div class="max-w-4xl mx-auto">

        {{-- Tombol Kembali --}}
        <a href="{{ route('admin.letters.index') }}"
            class="inline-flex items-center text-gray-400 hover:text-white mb-6 text-sm transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </a>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- KOLOM KIRI: Info Pemohon --}}
            <div class="md:col-span-2 space-y-6">
                <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
                    <h3 class="text-lg font-bold text-gray-100 border-b border-gray-700 pb-3 mb-4">Informasi Pemohon</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Nama Lengkap</p>
                            <p class="text-base font-medium text-gray-200 mt-1">
                                {{ $letter->nama_pemohon ?? $letter->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">NIK</p>
                            <p class="text-base font-medium text-gray-200 mt-1">{{ $letter->nik_pemohon ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Jenis Kelamin</p>
                            <p class="text-base font-medium text-gray-200 mt-1">{{ $letter->jenis_kelamin ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Agama</p>
                            <p class="text-base font-medium text-gray-200 mt-1">{{ $letter->agama ?? '-' }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Alamat / Tempat Tinggal</p>
                            <p class="text-base font-medium text-gray-200 mt-1">{{ $letter->alamat_pemohon ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
                    <h3 class="text-lg font-bold text-gray-100 border-b border-gray-700 pb-3 mb-4">Detail Permintaan</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Jenis Surat</p>
                            <p class="text-lg font-bold text-blue-400 mt-1">{{ $letter->jenis_surat }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Keperluan / Keterangan Tambahan</p>
                            <div
                                class="bg-gray-900 rounded p-4 text-gray-300 text-sm mt-2 leading-relaxed border border-gray-700">
                                {{ $letter->keterangan ?? 'Tidak ada keterangan tambahan.' }}
                            </div>
                        </div>

                        {{-- Jika ada lampiran file --}}
                        @if ($letter->attachment)
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide mb-2">Berkas Pendukung</p>
                                <a href="{{ asset('storage/' . $letter->attachment) }}" target="_blank"
                                    class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-200 rounded border border-gray-600 text-sm transition">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                    Lihat Lampiran
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: Aksi Admin --}}
            <div class="space-y-6">
                <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-gray-100 mb-4">Tindakan</h3>

                    <form action="{{ route('admin.letters.update', $letter->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-400 mb-2">Update Status</label>
                            <select name="status"
                                class="w-full bg-gray-900 border border-gray-600 text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                <option value="pending" {{ $letter->status == 'pending' ? 'selected' : '' }}>Pending
                                    (Menunggu)</option>
                                <option value="diproses" {{ $letter->status == 'diproses' ? 'selected' : '' }}>Diproses
                                    (Sedang Dibuat)</option>
                                <option value="selesai" {{ $letter->status == 'selesai' ? 'selected' : '' }}>Selesai (Siap
                                    Diambil)</option>
                                <option value="ditolak" {{ $letter->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </div>

                        {{-- Opsional: Catatan Admin --}}
                        {{-- <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Catatan Admin (Opsional)</label>
                        <textarea name="admin_note" rows="3" class="w-full bg-gray-900 border border-gray-600 text-gray-200 text-sm rounded-lg p-2.5"></textarea>
                    </div> --}}

                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 focus:outline-none transition">
                            Simpan Status
                        </button>
                    </form>

                    <hr class="border-gray-700 my-4">

                    <form action="{{ route('admin.letters.destroy', $letter->id) }}" method="POST"
                        onsubmit="return confirm('Hapus data pengajuan ini secara permanen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full text-red-400 hover:text-white hover:bg-red-600 border border-red-900 hover:border-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition">
                            Hapus Data
                        </button>
                    </form>

                    <div class="mt-4 p-3 bg-gray-900/50 rounded border border-gray-700">
                        <p class="text-xs text-gray-500 text-center">
                            Dibuat: {{ $letter->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
