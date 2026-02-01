@extends('layouts.admin')

@section('title', 'Potensi Desa')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Potensi & Produk</h2>
            <a href="{{ route('admin.potentials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                + Tambah Potensi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Nama Potensi</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($potentials as $item)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="w-12 h-12 rounded bg-gray-600 overflow-hidden">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-xs">No Img</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-white">{{ $item->title }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-gray-700 text-green-400 px-2 py-1 rounded text-xs border border-gray-600 uppercase">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.potentials.edit', $item->id) }}"
                                    class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('admin.potentials.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada data potensi desa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $potentials->links() }}
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Potensi Desa')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">Data Potensi Desa</h2>
                <p class="text-gray-400 text-sm">Kelola data UMKM, Wisata, dan Produk Unggulan.</p>
            </div>
            <a href="{{ route('admin.potentials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Potensi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Nama Potensi</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Lokasi</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($potentials as $item)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="w-16 h-12 rounded-lg overflow-hidden bg-gray-600 border border-gray-600">
                                    @if ($item->image_path)
                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No
                                            IMG</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-white">{{ $item->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-amber-900 text-amber-300 px-2 py-1 rounded text-xs border border-amber-700 uppercase font-bold">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ $item->address ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.potentials.edit', $item->id) }}"
                                    class="text-yellow-500 hover:text-yellow-400 font-medium text-sm">Edit</a>
                                <form action="{{ route('admin.potentials.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-400 font-medium text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <p>Belum ada data potensi desa.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $potentials->links() }}</div>
    </div>
@endsection
