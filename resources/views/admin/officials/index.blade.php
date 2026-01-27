@extends('layouts.admin')

@section('title', 'Perangkat Desa & Struktur')

@section('content')

    <div class="space-y-8">

        {{-- 1. BAGIAN STRUKTUR ORGANISASI (BARU) --}}
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-100">Bagan Struktur Organisasi</h3>
                    <p class="text-sm text-gray-400">Gambar bagan ini akan tampil di halaman publik Struktur Organisasi.</p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-8 items-center">
                {{-- Preview --}}
                <div class="w-full md:w-1/3">
                    @if ($profile && $profile->structure_image_path)
                        <div class="relative group rounded-lg overflow-hidden border border-gray-600">
                            <img src="{{ asset('storage/' . $profile->structure_image_path) }}"
                                class="w-full h-48 object-cover object-top hover:object-contain bg-gray-900 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition">
                                <a href="{{ asset('storage/' . $profile->structure_image_path) }}" target="_blank"
                                    class="text-xs bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-500">
                                    Lihat Full
                                </a>
                            </div>
                        </div>
                        <p class="text-center text-xs text-green-400 mt-2 font-medium">✓ Gambar Aktif</p>
                    @else
                        <div
                            class="h-48 bg-gray-700/50 rounded-lg border-2 border-dashed border-gray-600 flex flex-col items-center justify-center text-gray-500">
                            <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-xs">Belum ada gambar</span>
                        </div>
                    @endif
                </div>

                {{-- Form Upload --}}
                <div class="w-full md:w-2/3">
                    <form action="{{ route('admin.officials.structure') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-bold text-gray-300 mb-2">Upload / Ganti Gambar</label>
                            <input type="file" name="structure_image_path"
                                class="block w-full text-sm text-gray-400
                                file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0
                                file:text-sm file:font-semibold file:bg-blue-600 file:text-white
                                hover:file:bg-blue-700 cursor-pointer 
                                border border-gray-600 rounded-lg bg-gray-900 p-1"
                                accept="image/*" required>
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP. Max: 5MB.</p>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-bold shadow-md transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Simpan Struktur
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- 2. BAGIAN DAFTAR PERANGKAT DESA (TABEL LAMA) --}}
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-100">Daftar Personil Perangkat Desa</h3>
                <a href="{{ route('admin.officials.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Personil
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-700 text-gray-400 uppercase text-xs tracking-wider border-b border-gray-600">
                            <th class="p-4 font-semibold w-24">Urutan</th>
                            <th class="p-4 font-semibold">Foto</th>
                            <th class="p-4 font-semibold">Nama & Jabatan</th>
                            <th class="p-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 text-sm">
                        @forelse($officials as $official)
                            <tr class="hover:bg-gray-700/50 transition-colors">
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-900 text-gray-300 font-bold border border-gray-600">
                                        {{ $official->order_level }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if ($official->image_path)
                                        <img src="{{ asset('storage/' . $official->image_path) }}"
                                            class="h-12 w-12 object-cover rounded-full border-2 border-gray-600">
                                    @else
                                        <div
                                            class="h-12 w-12 rounded-full bg-gray-600 flex items-center justify-center text-xs text-gray-300 border-2 border-gray-500">
                                            No Pic
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-100 text-base">{{ $official->name }}</div>
                                    <div class="text-blue-400 text-xs uppercase tracking-wide font-semibold mt-0.5">
                                        {{ $official->position }}
                                    </div>
                                    @if ($official->nip)
                                        <div class="text-gray-500 text-[10px] mt-1">NIP: {{ $official->nip }}</div>
                                    @endif
                                </td>
                                <td class="p-4 text-right space-x-2">
                                    <a href="{{ route('admin.officials.edit', $official->id) }}"
                                        class="inline-block text-blue-400 hover:text-blue-300 font-medium transition">Edit</a>

                                    <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Hapus perangkat ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-400 hover:text-red-300 font-medium transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500 italic bg-gray-800 rounded-lg">
                                    Belum ada data perangkat desa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
