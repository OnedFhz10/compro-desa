@extends('layouts.admin')

@section('title', 'Tambah Agenda')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Tambah Agenda Baru</h2>
            <a href="{{ route('admin.agendas.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.agendas.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                {{-- Judul --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Kegiatan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Musyawarah Desa"
                        required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Lokasi <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: Balai Desa"
                        required class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                {{-- Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Tanggal Pelaksanaan <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="date" value="{{ old('date') }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                {{-- Waktu --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Waktu <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="time" value="{{ old('time') }}"
                        placeholder="Contoh: 08:00 WIB - Selesai" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Singkat</label>
                <textarea name="description" rows="4" placeholder="Jelaskan detail kegiatan..." required
                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">{{ old('description') }}</textarea>
            </div>

            {{-- Status Aktif --}}
            <div class="mb-6 bg-gray-700/50 p-4 rounded-xl border border-gray-600">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-500 rounded focus:ring-blue-600 focus:ring-2">
                    <span class="ml-2 text-sm font-medium text-gray-300">Tampilkan di Website?</span>
                </label>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end border-t border-gray-700 pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg">
                    Simpan Agenda
                </button>
            </div>
        </form>
    </div>
@endsection
