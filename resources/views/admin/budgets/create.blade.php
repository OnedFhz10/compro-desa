@extends('layouts.admin')

@section('title', 'Tambah Data Anggaran')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Tambah Data Anggaran</h2>
            <a href="{{ route('admin.budgets.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.budgets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Tahun Anggaran --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Tahun Anggaran</label>
                    <input type="number" name="year" value="{{ date('Y') }}" min="2020"
                        max="{{ date('Y') + 1 }}" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Kategori Data</label>
                    <select name="category" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                        <option value="apbdes">APBDes (Perencanaan)</option>
                        <option value="realisasi">Realisasi (Pelaksanaan)</option>
                        <option value="laporan">Laporan Lainnya</option>
                    </select>
                </div>

                {{-- Jenis (Pendapatan / Belanja) --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Jenis Transaksi</label>
                    <select name="type" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                        <option value="income" class="text-emerald-400">masuk (Pendapatan)</option>
                        <option value="expense" class="text-red-400">Keluar (Belanja)</option>
                    </select>
                </div>

                {{-- Nominal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Nominal (Rp)</label>
                    <input type="number" name="amount" placeholder="Contoh: 150000000" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
                    <p class="mt-1 text-xs text-gray-500">Tulis angka saja tanpa titik/koma.</p>
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">Uraian / Keterangan</label>
                <input type="text" name="description" placeholder="Contoh: Dana Desa Tahap 1, Belanja Pegawai, dll"
                    required class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg w-full p-2.5">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-300">File Bukti / Laporan (PDF/Gambar)</label>
                <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png"
                    class="block w-full text-xs text-gray-400 border border-gray-500 rounded cursor-pointer bg-gray-600">
                <p class="mt-1 text-xs text-gray-500">Opsional. Maks 5MB.</p>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-700">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection
