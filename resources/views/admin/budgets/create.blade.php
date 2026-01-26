@extends('layouts.admin')

@section('title', 'Tambah Anggaran')

@section('content')

    <div class="max-w-3xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-100">Catat Keuangan APBDes</h3>
            <a href="{{ route('admin.budgets.index') }}" class="text-gray-400 hover:text-white text-sm transition">&larr;
                Kembali</a>
        </div>

        <form action="{{ route('admin.budgets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Tahun Anggaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Tahun Anggaran</label>
                    <input type="number" name="year" value="{{ date('Y') }}" min="2020" max="2030"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                {{-- Jenis (Pendapatan/Belanja) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Jenis Transaksi</label>
                    <select name="type"
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                        <option value="income">Pendapatan Desa</option>
                        <option value="expense">Belanja Desa</option>
                    </select>
                </div>

                {{-- Uraian --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Uraian / Keterangan</label>
                    <input type="text" name="description" placeholder="Contoh: Dana Desa Tahap 1, Pembangunan Jalan..."
                        class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required>
                </div>

                {{-- Nominal --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Nominal (Rp)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="text-gray-500">Rp</span>
                        </div>
                        <input type="number" name="amount" placeholder="0" min="0"
                            class="w-full bg-gray-900 border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 p-2.5"
                            required>
                    </div>
                </div>

                {{-- File Bukti/Laporan --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">File Laporan (PDF/Gambar) - Opsional</label>
                    <input type="file" name="file"
                        class="block w-full text-sm text-gray-400
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-xs file:font-semibold
                    file:bg-gray-700 file:text-blue-400
                    hover:file:bg-gray-600 cursor-pointer
                    border border-gray-600 rounded-lg bg-gray-900
                ">
                    <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file 5MB.</p>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-700">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-lg transition transform hover:scale-105">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

@endsection
