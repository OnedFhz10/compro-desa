@extends('layouts.admin')

@section('title', 'Edit Agenda')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Edit Agenda</h2>
            <a href="{{ route('admin.agendas.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.agendas.update', $agenda->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title', $agenda->title) }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location', $agenda->location) }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Tanggal</label>
                    <input type="date" name="date" value="{{ old('date', $agenda->date->format('Y-m-d')) }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Waktu (Jam)</label>
                    <input type="text" name="time" value="{{ old('time', $agenda->time) }}"
                        placeholder="Contoh: 08:00 - Selesai" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Singkat</label>
                <textarea name="description" rows="4" required
                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">{{ old('description', $agenda->description) }}</textarea>
            </div>

            <div class="mb-6 bg-gray-700/50 p-4 rounded-xl border border-gray-600">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $agenda->is_active ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-500 rounded focus:ring-blue-600">
                    <span class="ml-2 text-sm font-medium text-gray-300">Tampilkan di Website?</span>
                </label>
            </div>

            <div class="flex justify-end border-t border-gray-700 pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
