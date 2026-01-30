@extends('layouts.admin')

@section('title', 'Tulis Berita Baru')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <div>
                <h2 class="text-xl font-bold text-white">Berita Baru</h2>
                <p class="text-sm text-gray-400">Bagikan informasi terbaru kepada warga desa.</p>
            </div>
            <a href="{{ route('admin.posts.index') }}"
                class="text-gray-400 hover:text-white text-sm bg-gray-700 px-3 py-1.5 rounded transition">
                &larr; Kembali
            </a>
        </div>

        {{-- Form dengan enctype multipart/form-data --}}
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid gap-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Kolom Kiri: Input Utama (Judul & Konten) --}}
                    <div class="md:col-span-2 space-y-6">
                        {{-- Judul --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Judul Berita <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Contoh: Kegiatan Kerja Bakti Dusun A">
                            @error('title')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Konten --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Isi Berita <span
                                    class="text-red-500">*</span></label>
                            <textarea name="content" rows="12" required
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 font-mono leading-relaxed"
                                placeholder="Tuliskan detail berita lengkap di sini...">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Kolom Kanan: Meta Data (Kategori & Gambar) --}}
                    <div class="space-y-6">

                        {{-- Kategori --}}
                        <div class="bg-gray-700 p-4 rounded-lg border border-gray-600">
                            <label class="block mb-2 text-sm font-medium text-gray-300">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select name="category_id" required
                                class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-2 text-[10px] text-gray-400">Pilih "Pengumuman" jika ini info resmi.</p>
                            @error('category_id')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Upload Gambar --}}
                        <div class="bg-gray-700 p-4 rounded-lg border border-gray-600">
                            <label class="block mb-2 text-sm font-medium text-gray-300">Gambar Utama</label>

                            {{-- Input Name harus 'image' sesuai validasi di Controller --}}
                            <input type="file" name="image" accept="image/*"
                                class="block w-full text-xs text-gray-400 border border-gray-500 rounded cursor-pointer bg-gray-600 focus:outline-none mb-2">

                            <p class="text-[10px] text-gray-400">Format: JPG, PNG, WEBP. Maks 2MB.</p>
                            @error('image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="border-t border-gray-700 pt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                            </path>
                        </svg>
                        Terbitkan Berita
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
