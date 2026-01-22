@extends('layouts.admin')
@section('title', 'Upload Foto Galeri')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-lg">
        <h3 class="font-bold text-lg mb-4">Tambah Foto Baru</h3>
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-1">Judul Foto (Opsional)</label>
                <input type="text" name="title" class="w-full border p-2 rounded" placeholder="Contoh: Kerja Bakti">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Pilih Foto</label>
                <input type="file" name="image" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Keterangan (Opsional)</label>
                <textarea name="description" rows="2" class="w-full border p-2 rounded"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-500 ml-3">Batal</a>
        </form>
    </div>
@endsection
