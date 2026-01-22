@extends('layouts.admin')
@section('title', 'Tambah Potensi Desa')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-2xl">
        <form action="{{ route('admin.potentials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Nama Potensi</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold">Kategori</label>
                <select name="category" class="w-full border p-2 rounded">
                    <option value="UMKM">UMKM</option>
                    <option value="Pariwisata">Pariwisata</option>
                    <option value="Pertanian">Pertanian</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-bold">Foto</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block font-bold">Deskripsi</label>
                <textarea name="description" rows="5" class="w-full border p-2 rounded"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
