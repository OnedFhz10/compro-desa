@extends('layouts.admin')

@section('title', 'Detail Permohonan')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- DETAIL DATA --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 h-fit">
            <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2">Data Pemohon</h3>
            <div class="space-y-4 text-sm">
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">Nama Lengkap</span>
                    <span class="col-span-2 text-white font-medium">: {{ $letter->name }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">NIK</span>
                    <span class="col-span-2 text-white font-medium">: {{ $letter->nik }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">No. HP/WA</span>
                    <span class="col-span-2 text-white font-medium">: {{ $letter->phone ?? '-' }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">Jenis Surat</span>
                    <span class="col-span-2 text-blue-400 font-bold">: {{ $letter->letter_type }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">Keperluan</span>
                    <span class="col-span-2 text-white">: {{ $letter->description ?? '-' }}</span>
                </div>
                <div class="grid grid-cols-3">
                    <span class="text-gray-400">Lampiran</span>
                    <span class="col-span-2 text-white">
                        @if ($letter->attachment)
                            <a href="{{ asset('storage/' . $letter->attachment) }}" target="_blank"
                                class="text-blue-400 underline">: Lihat File</a>
                        @else
                            : Tidak ada
                        @endif
                    </span>
                </div>
            </div>
        </div>

        {{-- FORM PROSES --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 h-fit">
            <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2">Proses Pengajuan</h3>
            <form action="{{ route('admin.letters.update', $letter->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-2 text-sm text-gray-300">Update Status</label>
                    <select name="status"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5">
                        <option value="pending" {{ $letter->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $letter->status == 'diproses' ? 'selected' : '' }}>Sedang Diproses
                        </option>
                        <option value="selesai" {{ $letter->status == 'selesai' ? 'selected' : '' }}>Selesai (Siap Diambil)
                        </option>
                        <option value="ditolak" {{ $letter->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm text-gray-300">Catatan Admin (Opsional)</label>
                    <textarea name="admin_note" rows="3" placeholder="Contoh: Silakan ambil surat di kantor desa hari Senin."
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5">{{ $letter->admin_note }}</textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.letters.index') }}"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg text-sm">Kembali</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold">Simpan
                        Status</button>
                </div>
            </form>
        </div>
    </div>
@endsection
