@extends('layouts.admin')
@section('title', 'Edit Foto')
@section('content')
    <div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold text-white mb-6">Edit Keterangan Foto</h2>
        <div class="mb-4"><img src="{{ asset('storage/' . $gallery->image_path) }}" class="h-40 rounded mx-auto"></div>
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm text-gray-300 mb-2">Judul</label>
                <input type="text" name="title" value="{{ $gallery->title }}"
                    class="w-full bg-gray-700 border border-gray-600 text-white rounded p-2">
            </div>
            <div class="mb-6">
                <label class="block text-sm text-gray-300 mb-2">Deskripsi</label>
                <textarea name="description" class="w-full bg-gray-700 border border-gray-600 text-white rounded p-2">{{ $gallery->description }}</textarea>
            </div>
            <button class="w-full bg-blue-600 text-white py-2 rounded font-bold">Simpan Perubahan</button>
        </form>
    </div>
@endsection
