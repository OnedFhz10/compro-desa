@extends('layouts.admin')

@section('title', 'Tambah Agenda')

@section('content')
    <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Buat Agenda Baru</h2>
            <a href="{{ route('admin.agendas.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.agendas.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                {{-- Judul --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nama Kegiatan</label>
                    <input type="text" name="title" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Tanggal & Jam --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Waktu Pelaksanaan</label>
                        <input type="datetime-local" name="event_date" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Lokasi</label>
                        <input type="text" name="location" placeholder="Balai Desa / Lapangan"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Singkat</label>
                    <textarea name="description" rows="4" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg">Simpan
                    Agenda</button>
            </div>
        </form>
    </div>
@endsection
