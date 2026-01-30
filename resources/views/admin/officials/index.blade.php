@extends('layouts.admin')

@section('title', 'Perangkat Desa')

@section('content')

    {{-- Bagian 1: Upload Bagan Struktur Organisasi --}}
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 mb-8 border border-gray-700">
        <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            Bagan Struktur Organisasi
        </h3>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            {{-- Preview Gambar --}}
            <div class="w-full md:w-1/3 bg-gray-700 rounded-lg p-2 border border-gray-600">
                @if ($profile->structure_image_path)
                    <img src="{{ asset('storage/' . $profile->structure_image_path) }}" class="w-full rounded">
                @else
                    <div class="h-40 flex items-center justify-center text-gray-500 text-sm">Belum ada bagan</div>
                @endif
            </div>

            {{-- Form Upload --}}
            <div class="flex-1">
                <form action="{{ route('admin.officials.structure') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="block mb-2 text-sm font-medium text-gray-300">Upload Gambar Bagan Baru</label>
                    <div class="flex gap-2">
                        <input type="file" name="structure_image_path" required accept="image/*"
                            class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-bold">
                            Upload
                        </button>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Gunakan file PNG/JPG kualitas tinggi agar tulisan terbaca jelas.
                    </p>
                </form>
            </div>
        </div>
    </div>

    {{-- Bagian 2: Daftar Perangkat Desa --}}
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Personil Perangkat Desa</h2>
            <a href="{{ route('admin.officials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                + Tambah Personil
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">No. Urut</th>
                        <th class="px-6 py-3">Foto</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Jabatan</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($officials as $official)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4 font-bold text-blue-400">{{ $official->order_level }}</td>
                            <td class="px-6 py-4">
                                <div class="w-10 h-10 rounded-full bg-gray-600 overflow-hidden">
                                    @if ($official->image_path)
                                        <img src="{{ asset('storage/' . $official->image_path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($official->name) }}"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-white">{{ $official->name }}</td>
                            <td class="px-6 py-4">{{ $official->position }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.officials.edit', $official->id) }}"
                                    class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada data perangkat desa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
