@extends('layouts.admin')

@section('title', 'Tambah Perangkat')

@section('content')
    <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Tambah Perangkat Desa</h2>
            <a href="{{ route('admin.officials.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6">

                <div class="grid grid-cols-2 gap-4">
                    {{-- Nama --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    {{-- No Urut --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">No. Urut Tampil</label>
                        <input type="number" name="order_level" value="1" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <p class="text-[10px] text-gray-500 mt-1">Angka kecil tampil di atas (1 = Kades)</p>
                    </div>
                </div>

                {{-- Jabatan --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Jabatan</label>
                    <input type="text" name="position" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Contoh: Kepala Desa, Sekretaris Desa">
                </div>

                {{-- NIP / Keterangan --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">NIP / NIAP (Opsional)</label>
                    <input type="text" name="nip"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Foto Profil</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection
