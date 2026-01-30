@extends('layouts.admin')

@section('title', 'Tambah Potensi')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Tambah Potensi Desa</h2>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.potentials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6">

                {{-- Nama --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Potensi / Produk</label>
                    <input type="text" name="title" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: Keripik Singkong, Curug Indah">
                </div>

                {{-- Kategori & Harga --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Kategori</label>
                        <select name="category" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="UMKM">UMKM</option>
                            <option value="Wisata">Wisata</option>
                            <option value="Produk">Produk</option>
                            <option value="Pertanian">Pertanian</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Harga (Opsional)</label>
                        <input type="number" name="price"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Rp">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Lengkap</label>
                    <textarea name="description" rows="5" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Jelaskan tentang potensi ini..."></textarea>
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Foto Utama</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg transition">
                    Simpan Potensi
                </button>
            </div>
        </form>
    </div>
@endsection
