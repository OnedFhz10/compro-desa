@extends('layouts.admin')

@section('title', 'Lembaga Desa')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Daftar Lembaga Desa</h2>
        <a href="{{ route('admin.institutions.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            + Tambah Lembaga
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Nama Lembaga</th>
                    <th class="px-6 py-3">Singkatan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($institutions as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                    class="w-12 h-12 rounded-full object-cover border">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-xs">No
                                    img</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">{{ $item->name }}</td>
                        <td class="px-6 py-4">{{ $item->abbreviation ?? '-' }}</td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('admin.institutions.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus lembaga ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data lembaga desa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
