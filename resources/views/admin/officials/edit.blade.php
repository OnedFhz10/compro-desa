@extends('layouts.admin')

@section('title', 'Tambah Perangkat Desa')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6 max-w-2xl">
        <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Lengkap --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required
                    placeholder="Contoh: Budi Santoso, S.Pd">
            </div>

            {{-- Jabatan --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
                <input type="text" name="position" class="w-full border border-gray-300 rounded-lg px-4 py-2" required
                    placeholder="Contoh: Kepala Desa / Sekretaris Desa">
            </div>

            {{-- NIP (Opsional tapi ditampilkan di Public jika ada) --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">NIP / NIAP (Opsional)</label>
                <input type="text" name="nip" class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    placeholder="Nomor Induk Perangkat...">
            </div>

            {{-- Foto Profil --}}
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Foto Resmi</label>
                <input type="file" name="image"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">Disarankan rasio foto portrait (3:4) agar rapi di halaman public.</p>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.officials.index') }}"
                    class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-bold">Simpan</button>
            </div>
        </form>
    </div>
@endsection
