@extends('layouts.admin')

@section('title', 'Edit Perangkat')

@section('content')

    <div class="max-w-2xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Edit Data Perangkat</h3>
            <a href="{{ route('admin.officials.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Batal</a>
        </div>

        <form action="{{ route('admin.officials.update', $official->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $official->name) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position', $official->position) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Urutan Tampilan</label>
                    <input type="number" name="order_level" value="{{ old('order_level', $official->order_level) }}"
                        min="1"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                <div class="p-4 bg-gray-900 rounded border border-gray-700">
                    <label class="block text-sm font-medium text-gray-400 mb-3">Foto Profil</label>

                    <div class="flex items-center gap-4">
                        @if ($official->image_path)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $official->image_path) }}"
                                    class="h-20 w-20 rounded-full object-cover border-2 border-gray-600">
                                <p class="text-[10px] text-gray-500 mt-1">Saat Ini</p>
                            </div>
                        @endif

                        <div class="flex-1">
                            <input type="file" name="image"
                                class="block w-full text-sm text-gray-400
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-xs file:font-semibold
                            file:bg-gray-800 file:text-blue-400
                            hover:file:bg-gray-700 cursor-pointer border border-gray-600 rounded-lg
                        ">
                            <p class="text-xs text-gray-500 mt-1">Upload foto baru untuk mengganti.</p>
                        </div>
                    </div>
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
