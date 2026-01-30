@extends('layouts.admin')

@section('title', 'Tambah Data Anggaran')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Input Data Transparansi</h2>
            <a href="{{ route('admin.budgets.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.budgets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6">

                <div class="grid grid-cols-2 gap-4">
                    {{-- Tahun Anggaran --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Tahun Anggaran</label>
                        <input type="number" name="year" value="{{ date('Y') }}" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    {{-- Kategori (INI YANG KEMARIN HILANG) --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Jenis Laporan</label>
                        <select name="category" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="apbdes">APBDes Murni/Perubahan</option>
                            <option value="realisasi">Realisasi Anggaran</option>
                            <option value="laporan">Laporan Tahunan (LPPDes)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Jenis Arus Kas --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Jenis Arus Kas</label>
                        <select name="type" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="income">Pendapatan (Uang Masuk)</option>
                            <option value="expense">Belanja (Uang Keluar)</option>
                        </select>
                    </div>

                    {{-- Nominal --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Nominal (Rp)</label>
                        <input type="number" name="amount" required placeholder="Contoh: 150000000"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                {{-- Uraian --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Uraian / Keterangan</label>
                    <textarea name="description" rows="3" required placeholder="Contoh: Dana Desa Tahap 1"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                </div>

                {{-- File --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Lampiran Dokumen (Opsional)</label>
                    <input type="file" name="file" accept=".pdf,.jpg,.png,.jpeg"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                    <p class="mt-1 text-xs text-gray-500">Format: PDF atau Gambar (Max 5MB)</p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection
