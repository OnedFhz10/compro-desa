@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

    <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Edit Berita</h3>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Batal</a>
        </div>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-400 mb-2">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5"
                    required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Kategori</label>
                    <select name="category_id"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Gambar (Biarkan kosong jika tidak
                        diganti)</label>
                    @if ($post->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->image) }}"
                                class="h-16 w-auto rounded border border-gray-600 p-1 bg-gray-900">
                        </div>
                    @endif
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-gray-700 file:text-blue-400 hover:file:bg-gray-600 cursor-pointer border border-gray-600 rounded-lg bg-gray-900">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-400 mb-2">Isi Berita</label>
                <textarea name="content" rows="12"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-700">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow-md transition transform hover:scale-105">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
