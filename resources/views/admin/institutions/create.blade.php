@extends('layouts.admin')
@section('title', 'Tambah Lembaga Desa')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-lg">
        <h3 class="font-bold text-lg mb-4">Input Data Lembaga</h3>
        <form action="{{ route('admin.institutions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-bold mb-1">Nama Lembaga</label>
                <input type="text" name="name" class="w-full border p-2 rounded focus:outline-blue-500"
                    placeholder="Contoh: Badan Permusyawaratan Desa" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Singkatan (Opsional)</label>
                <input type="text" name="abbreviation" class="w-full border p-2 rounded focus:outline-blue-500"
                    placeholder="Contoh: BPD">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Logo Lembaga</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Tugas & Fungsi (Deskripsi)</label>
                <textarea name="description" rows="4" class="w-full border p-2 rounded focus:outline-blue-500"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('admin.institutions.index') }}" class="text-gray-500 ml-3">Batal</a>
        </form>
    </div>
@endsection
