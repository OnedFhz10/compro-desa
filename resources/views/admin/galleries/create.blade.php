@extends('layouts.admin')

@section('title', 'Upload Foto')

@section('content')

    <div class="max-w-xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Upload Foto Baru</h3>
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-5">

                {{-- Area Upload --}}
                <div
                    class="p-6 border-2 border-dashed border-gray-600 rounded-xl bg-gray-900 text-center hover:border-blue-500 transition-colors group">
                    <svg class="mx-auto h-12 w-12 text-gray-500 group-hover:text-blue-500 transition" stroke="currentColor"
                        fill="none" viewBox="0 0 48 48">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="mt-4 flex text-sm text-gray-400 justify-center">
                        <label for="file-upload"
                            class="relative cursor-pointer rounded-md font-medium text-blue-400 hover:text-blue-300 focus-within:outline-none">
                            <span>Pilih file gambar</span>
                            <input id="file-upload" name="image" type="file" class="sr-only" accept="image/*"
                                onchange="document.getElementById('preview-text').innerText = this.files[0].name">
                        </label>
                        <p class="pl-1">atau drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                    <p id="preview-text" class="text-sm text-green-400 mt-2 font-semibold"></p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Judul Foto (Opsional)</label>
                    <input type="text" name="title" placeholder="Contoh: Kerja Bakti RT 01"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Keterangan (Opsional)</label>
                    <textarea name="description" rows="3" placeholder="Ceritakan sedikit tentang foto ini..."
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"></textarea>
                </div>
            </div>

            <div class="flex justify-end pt-6 mt-6 border-t border-gray-700">
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition transform hover:scale-105">
                    Upload Foto
                </button>
            </div>
        </form>
    </div>

@endsection
