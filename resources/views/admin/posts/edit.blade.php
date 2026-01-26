@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    
    <div class="mb-6 border-b pb-4 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Edit Berita</h3>
        <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">&larr; Batal</a>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5 border" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select name="category_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2.5 border bg-white">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar (Biarkan kosong jika tidak diganti)</label>
                @if($post->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $post->image) }}" class="h-16 w-auto rounded border p-1">
                    </div>
                @endif
                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
            <textarea name="content" rows="12" 
                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 border font-sans text-gray-700">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow-md transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection