@extends('layouts.admin')

@section('title', 'Tambah Potensi')

@section('content')

    <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Formulir Potensi Desa</h3>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.potentials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                {{-- Nama Potensi --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Nama Potensi / Produk</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        placeholder="Contoh: Kripik Singkong Khas Desa / Air Terjun..."
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Kategori</label>
                    <select name="category"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                        <option value="Produk Unggulan">Produk Unggulan (UMKM)</option>
                        <option value="Wisata Alam">Wisata Alam</option>
                        <option value="Kuliner">Kuliner</option>
                        <option value="Seni Budaya">Seni & Budaya</option>
                    </select>
                </div>

                {{-- Harga (Opsional) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Harga (Opsional)</label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="Contoh: 15000"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ada harga spesifik.</p>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-400 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="5"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                    required>{{ old('description') }}</textarea>
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-400 mb-2">Foto Potensi</label>
                <input type="file" name="image"
                    class="block w-full text-sm text-gray-400
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-xs file:font-semibold
                file:bg-gray-700 file:text-blue-400
                hover:file:bg-gray-600 cursor-pointer
                border border-gray-600 rounded-lg bg-gray-900
            ">
                <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG. Maksimal 2MB.</p>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-700">
                <button type="reset"
                    class="px-5 py-2.5 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition">Reset</button>
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition transform hover:scale-105">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

@endsection
