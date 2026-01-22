@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-4xl">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block font-bold mb-1">Judul Berita</label>
                <input type="text" name="title" value="{{ $post->title }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Gambar (Kosongkan jika tidak diganti)</label>
                @if($post->image_path)
                    <img src="{{ asset('storage/'.$post->image_path) }}" class="h-20 mb-2">
                @endif
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Isi Berita</label>
                <textarea name="content" rows="10" class="w-full border p-2 rounded">{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold">Simpan Perubahan</button>
        </form>
    </div>
@endsection