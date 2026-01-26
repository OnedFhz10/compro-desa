@extends('layouts.admin')

@section('title', 'Tulis Berita Baru')

@section('content')

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-6">

        <div class="mb-6 border-b pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Formulir Berita</h3>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    placeholder="Contoh: Kegiatan Kerja Bakti Desa Maju Jaya"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5 border"
                    required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category_id"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5 border bg-white">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Upload Gambar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-xs file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                ">
                    <p class="text-xs text-gray-400 mt-1">Opsional. Max 2MB.</p>
                </div>
            </div>

            {{-- Konten Artikel --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
                <textarea name="content" rows="12" placeholder="Tulis isi berita di sini..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 border font-sans text-gray-700 leading-relaxed">{{ old('content') }}</textarea>
                <p class="text-xs text-gray-400 mt-2 text-right">Tips: Tekan Enter 2x untuk paragraf baru.</p>
            </div>

            <div class="flex justify-end gap-3">
                <button type="reset"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition">Reset</button>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow-md transition transform hover:scale-105">
                    Terbitkan Berita
                </button>
            </div>
        </form>
    </div>

@endsection
