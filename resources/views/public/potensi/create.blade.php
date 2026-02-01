@extends('layouts.admin')

@section('title', 'Tambah Potensi')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Tambah Potensi Desa</h2>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.potentials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                {{-- Nama Potensi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Potensi / Usaha <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        placeholder="Contoh: Keripik Singkong / Curug Indah" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Kategori (Dropdown) --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Kategori <span
                            class="text-red-500">*</span></label>
                    <select name="category" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Wisata">Wisata Alam / Buatan</option>
                        <option value="UMKM">UMKM & Ekonomi Kreatif</option>
                        <option value="Pertanian">Pertanian & Perkebunan</option>
                        <option value="Peternakan">Peternakan & Perikanan</option>
                        <option value="Seni Budaya">Seni & Budaya</option>
                        <option value="Produk Unggulan">Produk Unggulan Desa</option>
                    </select>
                </div>

                {{-- Lokasi --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-300">Alamat / Lokasi</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        placeholder="Contoh: Dusun Sukamaju, RW 05"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Lengkap <span
                        class="text-red-500">*</span></label>
                <textarea name="description" rows="6" placeholder="Jelaskan tentang potensi ini..." required
                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">{{ old('description') }}</textarea>
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Foto Utama</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WEBP. Maks 2MB.</p>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end border-t border-gray-700 pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection
