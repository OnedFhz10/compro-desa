@extends('layouts.admin')

@section('title', 'Edit Potensi')

@section('content')

    <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Edit Data Potensi</h3>
            <a href="{{ route('admin.potentials.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Batal</a>
        </div>

        <form action="{{ route('admin.potentials.update', $potential->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Nama Potensi / Produk</label>
                    <input type="text" name="title" value="{{ old('title', $potential->title) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Kategori</label>
                    <select name="category"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                        <option value="Produk Unggulan" {{ $potential->category == 'Produk Unggulan' ? 'selected' : '' }}>
                            Produk Unggulan (UMKM)</option>
                        <option value="Wisata Alam" {{ $potential->category == 'Wisata Alam' ? 'selected' : '' }}>Wisata
                            Alam</option>
                        <option value="Kuliner" {{ $potential->category == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                        <option value="Seni Budaya" {{ $potential->category == 'Seni Budaya' ? 'selected' : '' }}>Seni &
                            Budaya</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Harga (Opsional)</label>
                    <input type="number" name="price" value="{{ old('price', $potential->price) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-400 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="5"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">{{ old('description', $potential->description) }}</textarea>
            </div>

            <div class="mb-8 p-4 bg-gray-900 rounded border border-gray-700">
                <label class="block text-sm font-medium text-gray-400 mb-2">Ganti Foto (Opsional)</label>

                @if ($potential->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $potential->image) }}" class="h-24 rounded border border-gray-600">
                        <p class="text-xs text-gray-500 mt-1">Foto saat ini</p>
                    </div>
                @endif

                <input type="file" name="image"
                    class="block w-full text-sm text-gray-400
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-xs file:font-semibold
                file:bg-gray-800 file:text-blue-400
                hover:file:bg-gray-700 cursor-pointer border border-gray-600 rounded-lg
            ">
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-700">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
