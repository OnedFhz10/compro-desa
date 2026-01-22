@extends('layouts.admin')

@section('title', 'Edit Potensi Desa')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-xl">Edit Potensi</h3>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-500 text-sm hover:underline">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.potentials.update', $potential->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kolom Kiri --}}
                <div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2 text-gray-700">Nama Potensi</label>
                        <input type="text" name="title" value="{{ old('title', $potential->title) }}"
                            class="w-full border p-2 rounded focus:outline-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2 text-gray-700">Kategori</label>
                        <select name="category" class="w-full border p-2 rounded focus:outline-blue-500">
                            <option value="UMKM" {{ $potential->category == 'UMKM' ? 'selected' : '' }}>UMKM</option>
                            <option value="Pariwisata" {{ $potential->category == 'Pariwisata' ? 'selected' : '' }}>
                                Pariwisata</option>
                            <option value="Pertanian" {{ $potential->category == 'Pertanian' ? 'selected' : '' }}>Pertanian
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2 text-gray-700">Gambar Utama</label>
                        @if ($potential->image_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $potential->image_path) }}"
                                    class="h-24 w-auto rounded border">
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full border p-2 rounded text-sm text-gray-500">
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2 text-gray-700">Deskripsi Lengkap</label>
                        <textarea name="description" rows="8" class="w-full border p-2 rounded focus:outline-blue-500">{{ old('description', $potential->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 border-t pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 transition w-full md:w-auto">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
