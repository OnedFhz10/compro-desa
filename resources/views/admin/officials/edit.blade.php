@extends('layouts.admin')

@section('title', 'Edit Perangkat Desa')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-xl">Edit Data</h3>
            <a href="{{ route('admin.officials.index') }}" class="text-gray-500 text-sm hover:underline">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.officials.update', $official->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold mb-2 text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $official->name) }}"
                    class="w-full border p-2 rounded focus:outline-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2 text-gray-700">Jabatan</label>
                <input type="text" name="position" value="{{ old('position', $official->position) }}"
                    class="w-full border p-2 rounded focus:outline-blue-500" placeholder="Contoh: Kepala Desa" required>
            </div>

            <div class="mb-6">
                <label class="block font-bold mb-2 text-gray-700">Foto Profil</label>

                @if ($official->image_path)
                    <div class="mb-2">
                        <p class="text-xs text-gray-500 mb-1">Foto Saat Ini:</p>
                        <img src="{{ asset('storage/' . $official->image_path) }}"
                            class="h-20 w-20 object-cover rounded border">
                    </div>
                @endif

                <input type="file" name="image"
                    class="w-full border p-2 rounded text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection
