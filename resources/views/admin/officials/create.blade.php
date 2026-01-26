@extends('layouts.admin')

@section('title', 'Tambah Perangkat')

@section('content')

    <div class="max-w-2xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Biodata Perangkat Desa</h3>
            <a href="{{ route('admin.officials.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-5">
                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        placeholder="Contoh: Budi Santoso, S.Pd"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                {{-- Jabatan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position') }}"
                        placeholder="Contoh: Kepala Desa / Sekretaris Desa"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                {{-- Urutan Tampilan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Urutan Tampilan</label>
                    <input type="number" name="order_level" value="{{ old('order_level', 1) }}" min="1"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                    <p class="text-xs text-gray-500 mt-1">Angka 1 untuk posisi paling atas (Kepala Desa), 2 untuk
                        Sekretaris, dst.</p>
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Foto Resmi</label>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-400
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-xs file:font-semibold
                    file:bg-gray-700 file:text-blue-400
                    hover:file:bg-gray-600 cursor-pointer
                    border border-gray-600 rounded-lg bg-gray-900
                ">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG, rasio potret disarankan. Max 2MB.</p>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 mt-6 border-t border-gray-700">
                <button type="reset"
                    class="px-5 py-2.5 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition">Reset</button>
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition transform hover:scale-105">
                    Simpan Perangkat
                </button>
            </div>
        </form>
    </div>

@endsection
