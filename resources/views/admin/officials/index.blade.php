@extends('layouts.admin')

@section('title', 'Daftar Perangkat Desa')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Struktur Organisasi</h2>
        <a href="{{ route('admin.officials.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            + Tambah Perangkat
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Foto</th>
                    <th class="px-6 py-3">Nama Lengkap</th>
                    <th class="px-6 py-3">Jabatan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($officials as $official)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if ($official->image_path)
                                <img src="{{ asset('storage/' . $official->image_path) }}"
                                    class="w-12 h-12 rounded-full object-cover border">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-xs">No
                                    Pic</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">{{ $official->name }}</td>
                        <td class="px-6 py-4">{{ $official->position }}</td>
                        <td class="px-6 py-4 text-center flex justify-center space-x-3">
                            <a href="{{ route('admin.officials.edit', $official->id) }}"
                                class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>

                            <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus perangkat desa ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data perangkat desa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
