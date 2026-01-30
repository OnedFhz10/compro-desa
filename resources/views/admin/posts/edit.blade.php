@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Edit Berita</h2>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Konten</label>
                        <textarea name="content" rows="12" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-3">{{ old('content', $post->content) }}</textarea>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-700 p-4 rounded-lg">
                        <label class="block mb-2 text-sm font-medium text-gray-300">Kategori</label>
                        <select name="category_id" required
                            class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg w-full p-2.5">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="bg-gray-700 p-4 rounded-lg">
                        <label class="block mb-3 text-sm font-medium text-gray-300">Gambar</label>

                        {{-- PERBAIKAN: image_path --}}
                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}"
                                class="mb-3 w-full rounded border border-gray-500">
                        @endif

                        <input type="file" name="image" accept="image/*"
                            class="block w-full text-xs text-gray-400 border border-gray-500 rounded bg-gray-600">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection
