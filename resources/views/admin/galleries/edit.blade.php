@extends('layouts.admin')

@section('title', 'Edit Foto')

@section('content')

    <div class="max-w-xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Edit Keterangan Foto</h3>
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Batal</a>
        </div>

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Preview Gambar --}}
            <div class="mb-6 text-center">
                <img src="{{ asset('storage/' . $gallery->image_path) }}"
                    class="mx-auto h-48 rounded-lg border border-gray-600 shadow-md object-contain bg-gray-900">
                <p class="text-xs text-gray-500 mt-2">Gambar tidak dapat diubah. Hapus dan upload baru jika ingin mengganti
                    gambar.</p>
            </div>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Judul Foto</label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Keterangan</label>
                    <textarea name="description" rows="3"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">{{ old('description', $gallery->description) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end pt-6 mt-6 border-t border-gray-700">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
