@extends('layouts.admin')

@php
    // Definisikan variabel local agar aman dari error undefined
    $currentCategory = $selectedCategory ?? null;
@endphp

@section('title', 'Tambah ' . ($currentCategory ? $currentCategory->name : 'Berita Baru'))

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <div>
                <h2 class="text-xl font-bold text-white">
                    {{-- Judul Dinamis --}}
                    Tambah {{ $currentCategory ? $currentCategory->name : 'Berita / Artikel' }}
                </h2>
                <p class="text-sm text-gray-400">
                    {{ $currentCategory ? 'Kategori otomatis terpilih: ' . $currentCategory->name : 'Silakan isi form di bawah ini.' }}
                </p>
            </div>
            <a href="{{ route('admin.posts.index', ['category' => $currentCategory?->slug]) }}"
                class="text-gray-400 hover:text-white text-sm bg-gray-700 px-3 py-1.5 rounded transition">
                &larr; Kembali
            </a>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Kirim category slug kembali untuk redirect setelah save --}}
            @if (request()->has('category'))
                <input type="hidden" name="category" value="{{ request()->category }}">
            @endif

            <div class="grid gap-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Kolom Kiri: Input Utama --}}
                    <div class="md:col-span-2 space-y-6">

                        {{-- JUDUL --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Judul <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul..."
                                required
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- KATEGORI (HIDDEN / OTOMATIS) --}}
                        @if ($currentCategory)
                            {{-- Jika kategori sudah terpilih dari URL, gunakan input hidden --}}
                            <input type="hidden" name="category_id" value="{{ $currentCategory->id }}">
                        @else
                            {{-- Fallback: Jika diakses langsung tanpa parameter --}}
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Kategori</label>
                                <select name="category_id" required
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        {{-- KONTEN EDITOR --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Isi Konten <span
                                    class="text-red-500">*</span></label>
                            <textarea name="content" rows="12" placeholder="Tulis konten di sini..." required
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-4 focus:ring-blue-500 focus:border-blue-500 font-sans leading-relaxed">{{ old('content') }}</textarea>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Gambar & Opsi --}}
                    <div class="space-y-6">

                        {{-- UPLOAD GAMBAR --}}
                        <div class="bg-gray-700/50 p-4 rounded-xl border border-gray-600">
                            <label class="block mb-3 text-sm font-medium text-gray-300">Gambar Utama</label>

                            {{-- Preview Image --}}
                            <div
                                class="mb-3 w-full h-40 bg-gray-600 rounded-lg overflow-hidden flex items-center justify-center text-gray-400 border border-dashed border-gray-500 relative">
                                <img id="image-preview" class="absolute inset-0 w-full h-full object-cover hidden">
                                <span class="text-xs z-0">Preview Gambar</span>
                            </div>

                            <input type="file" name="image" accept="image/*"
                                onchange="document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('image-preview').classList.remove('hidden');"
                                class="block w-full text-xs text-gray-400 border border-gray-500 rounded cursor-pointer bg-gray-600 focus:outline-none mb-2">

                            <p class="text-[10px] text-gray-400">Format: JPG, PNG, WEBP. Maks 2MB.</p>
                        </div>

                        {{-- STATUS PUBLIKASI --}}
                        <div class="bg-gray-700/50 p-4 rounded-xl border border-gray-600">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="is_published" value="1" checked
                                    class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-500 rounded focus:ring-blue-600 focus:ring-2">
                                <span class="ml-2 text-sm font-medium text-gray-300">Terbitkan Langsung?</span>
                            </label>
                        </div>

                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="border-t border-gray-700 pt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-lg flex items-center gap-2">
                        Simpan Data
                    </button>
                </div>
        </form>
    </div>
    </div>
@endsection
