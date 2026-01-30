@extends('layouts.admin')

@section('title', 'Edit Data Anggaran')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-white">Edit Data Transparansi</h2>
            <a href="{{ route('admin.budgets.index') }}" class="text-gray-400 hover:text-white text-sm">&larr; Kembali</a>
        </div>

        <form action="{{ route('admin.budgets.update', $budget->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid gap-6">

                <div class="grid grid-cols-2 gap-4">
                    {{-- Tahun --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Tahun Anggaran</label>
                        <input type="number" name="year" value="{{ $budget->year }}" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Jenis Laporan</label>
                        <select name="category" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="apbdes" {{ $budget->category == 'apbdes' ? 'selected' : '' }}>APBDes</option>
                            <option value="realisasi" {{ $budget->category == 'realisasi' ? 'selected' : '' }}>Realisasi
                            </option>
                            <option value="laporan" {{ $budget->category == 'laporan' ? 'selected' : '' }}>Laporan Tahunan
                            </option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Tipe --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Jenis Arus Kas</label>
                        <select name="type" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="income" {{ $budget->type == 'income' ? 'selected' : '' }}>Pendapatan</option>
                            <option value="expense" {{ $budget->type == 'expense' ? 'selected' : '' }}>Belanja</option>
                        </select>
                    </div>

                    {{-- Nominal --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Nominal (Rp)</label>
                        <input type="number" name="amount" value="{{ $budget->amount }}" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                {{-- Uraian --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Uraian</label>
                    <textarea name="description" rows="3" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ $budget->description }}</textarea>
                </div>

                {{-- File --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">Ganti Dokumen (Opsional)</label>
                    @if ($budget->file_path)
                        <div class="text-xs text-blue-400 mb-2">File saat ini: <a
                                href="{{ asset('storage/' . $budget->file_path) }}" target="_blank" class="underline">Lihat
                                Dokumen</a></div>
                    @endif
                    <input type="file" name="file" accept=".pdf,.jpg,.png"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-lg transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
