@extends('layouts.admin')
@section('title', 'Tambah Perangkat Desa')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-lg">
        <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold">Jabatan</label>
                <input type="text" name="position" class="w-full border p-2 rounded" placeholder="Contoh: Kepala Desa"
                    required>
            </div>
            <div class="mb-4">
                <label class="block font-bold">Foto</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
