@extends('layouts.admin')

@section('title', 'Daftar Potensi Desa')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Potensi UMKM & Wisata</h2>
        <a href="{{ route('admin.potentials.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            + Tambah Potensi
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Gambar</th>
                    <th class="px-6 py-3">Nama Potensi</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($potentials as $potential)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if ($potential->image_path)
                                <img src="{{ asset('storage/' . $potential->image_path) }}"
                                    class="w-16 h-12 object-cover rounded border">
                            @else
                                <span class="text-xs text-gray-400">No Img</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">{{ $potential->title }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                {{ $potential->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center space-x-3">
                            <a href="{{ route('admin.potentials.edit', $potential->id) }}"
                                class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>

                            <form action="{{ route('admin.potentials.destroy', $potential->id) }}" method="POST"
                                onsubmit="return confirm('Hapus data potensi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data potensi desa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination Link --}}
        <div class="p-4">
            {{ $potentials->links() }}
        </div>
    </div>
@endsection
