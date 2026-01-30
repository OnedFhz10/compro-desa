@extends('layouts.admin')

@section('title', 'Upload Foto')

@section('content')
    <div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Upload Foto Baru</h2>
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">

                {{-- Upload Gambar --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">File Foto</label>
                    <input type="file" name="image" required accept="image/*"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                </div>

                {{-- Judul --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Judul (Opsional)</label>
                    <input type="text" name="title"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Keterangan (Opsional)</label>
                    <textarea name="description" rows="3"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg">Upload Foto</button>
            </div>
        </form>
    </div>
@endsection
