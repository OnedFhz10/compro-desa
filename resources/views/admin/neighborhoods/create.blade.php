@extends('layouts.admin')

@section('title', 'Tambah Data RT')

@section('content')
    <div class="max-w-md mx-auto bg-gray-800 rounded-lg shadow border border-gray-700 p-6">

        <div class="mb-5 border-b border-gray-700 pb-3 flex justify-between items-center">
            <h3 class="font-bold text-gray-200">Formulir RT</h3>
            <a href="{{ route('admin.neighborhoods.index') }}" class="text-gray-400 hover:text-white text-xs">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.neighborhoods.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Dusun --}}
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-1">Nama Dusun</label>
                <input type="text" name="dusun"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded px-3 py-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none"
                    placeholder="Contoh: Dusun Krajan" required>
            </div>

            {{-- RW & RT (Grid) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1">Nomor RW</label>
                    <input type="text" name="rw"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded px-3 py-2 focus:border-blue-500 outline-none"
                        placeholder="01" required>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1">Nomor RT</label>
                    <input type="text" name="rt"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded px-3 py-2 focus:border-blue-500 outline-none"
                        placeholder="05" required>
                </div>
            </div>

            {{-- Ketua RT (head_name) --}}
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-1">Nama Ketua RT</label>
                <input type="text" name="head_name"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded px-3 py-2 focus:border-blue-500 outline-none"
                    placeholder="Nama Lengkap" required>
            </div>

            {{-- HP --}}
            <div>
                <label class="block text-xs font-medium text-gray-400 mb-1">No. HP (Opsional)</label>
                <input type="text" name="phone"
                    class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded px-3 py-2 focus:border-blue-500 outline-none"
                    placeholder="08...">
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded text-sm transition">Simpan
                    Data</button>
            </div>
        </form>
    </div>
@endsection
