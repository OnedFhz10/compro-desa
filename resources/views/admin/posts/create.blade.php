@extends('layouts.admin')
@section('title', 'Tulis Berita Baru')
@section('content')
    <div class="bg-white p-6 rounded shadow max-w-4xl">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-1">Judul Berita</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Gambar Utama</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Isi Berita</label>
                <textarea name="content" rows="10" class="w-full border p-2 rounded"></textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded font-bold">Terbitkan</button>
        </form>
    </div>
@endsection
