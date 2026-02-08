@extends('layouts.admin')

@section('title', 'Edit Lembaga Desa')

@section('content')
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6 max-w-2xl mx-auto">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="font-bold text-lg text-gray-100">Edit Data Lembaga</h3>
            <a href="{{ route('admin.institutions.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.institutions.update', $institution->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium text-gray-400 mb-2">Nama Lembaga</label>
                <input type="text" name="name" value="{{ old('name', $institution->name) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: Badan Permusyawaratan Desa" required>
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-400 mb-2">Singkatan (Opsional)</label>
                <input type="text" name="abbreviation" value="{{ old('abbreviation', $institution->abbreviation) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: BPD">
                @error('abbreviation')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-400 mb-2">Logo Lembaga</label>
                
                {{-- Preview logo existing --}}
                @if ($institution->image_path)
                    <div class="mb-3">
                        <p class="text-xs text-gray-500 mb-2">Logo saat ini:</p>
                        <img src="{{ asset('storage/' . $institution->image_path) }}" 
                            class="h-24 w-24 object-contain bg-gray-700 rounded-lg p-2 border border-gray-600">
                    </div>
                @endif

                <input type="file" name="image"
                    class="block w-full text-sm text-gray-400
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-xs file:font-semibold
                file:bg-gray-700 file:text-blue-400
                hover:file:bg-gray-600 cursor-pointer
                border border-gray-600 rounded-lg bg-gray-900">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah logo</p>
                @error('image')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-400 mb-2">Tugas & Fungsi (Deskripsi)</label>
                <textarea name="description" rows="4"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Jelaskan peran lembaga...">{{ old('description', $institution->description) }}</textarea>
                @error('description')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-700">
                <a href="{{ route('admin.institutions.index') }}"
                    class="px-5 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition">Batal</a>
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg transition transform hover:scale-105">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection
