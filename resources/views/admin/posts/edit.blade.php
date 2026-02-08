@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Edit Berita</h2>
            <a href="{{ route('admin.posts.index', ['category' => $post->category->slug]) }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
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
                    {{-- KATEGORI (HIDDEN, TIDAK BISA DIUBAH) --}}
                    <input type="hidden" name="category_id" value="{{ $post->category_id }}">

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

                    {{-- STATUS PUBLIKASI --}}
                    <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600">
                        <label class="block mb-3 text-sm font-medium text-gray-300">Status</label>
                        
                        <label class="flex items-center cursor-pointer mb-3">
                            <input type="checkbox" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-500 rounded focus:ring-blue-600 focus:ring-2">
                            <span class="ml-2 text-sm font-medium text-gray-300">Diterbitkan</span>
                        </label>

                        <label class="flex items-center cursor-pointer pt-3 border-t border-gray-600">
                            <input type="checkbox" name="is_featured" value="1" {{ $post->is_featured ? 'checked' : '' }}
                                class="w-4 h-4 text-orange-500 bg-gray-700 border-gray-500 rounded focus:ring-orange-500 focus:ring-2">
                            <span class="ml-2 text-sm font-medium text-orange-300">Tandai Penting / Featured</span>
                        </label>
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
