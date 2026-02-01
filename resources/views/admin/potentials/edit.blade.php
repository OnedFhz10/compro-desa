@extends('layouts.admin')

@section('title', 'Edit Potensi')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Edit Potensi Desa</h2>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.potentials.update', $potential->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Wajib untuk Update Data --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                {{-- Nama Potensi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Potensi / Usaha <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $potential->title) }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Kategori <span
                            class="text-red-500">*</span></label>
                    <select name="category" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                        @foreach (['Wisata', 'UMKM', 'Pertanian', 'Peternakan', 'Seni Budaya', 'Produk Unggulan'] as $cat)
                            <option value="{{ $cat }}" {{ $potential->category == $cat ? 'selected' : '' }}>
                                {{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Lokasi --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-300">Alamat / Lokasi</label>
                    <input type="text" name="address" value="{{ old('address', $potential->address) }}"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Lengkap <span
                        class="text-red-500">*</span></label>
                <textarea name="description" rows="6" required
                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">{{ old('description', $potential->description) }}</textarea>
            </div>

            {{-- Upload Gambar (Preview) --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Foto Utama</label>

                {{-- Tampilkan gambar lama jika ada --}}
                @if ($potential->image_path)
                    <div class="mb-3">
                        <span class="text-xs text-gray-400 block mb-1">Gambar Saat Ini:</span>
                        <img src="{{ asset('storage/' . $potential->image_path) }}"
                            class="h-32 rounded-lg border border-gray-600">
                    </div>
                @endif

                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar.</p>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end border-t border-gray-700 pt-4">
                <button type="submit"
                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg">
                    Update Data
                </button>
            </div>
        </form>
    </div>
@endsection
