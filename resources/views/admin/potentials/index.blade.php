@extends('layouts.admin')

@section('title', 'Potensi Desa')

@section('content')

    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">Daftar Potensi & UMKM</h3>
            <a href="{{ route('admin.potentials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Potensi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-400 uppercase text-xs tracking-wider border-b border-gray-600">
                        <th class="p-4 font-semibold">Gambar</th>
                        <th class="p-4 font-semibold">Nama Potensi</th>
                        <th class="p-4 font-semibold">Kategori</th>
                        <th class="p-4 font-semibold">Deskripsi Singkat</th>
                        <th class="p-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse($potentials as $item)
                        <tr class="hover:bg-gray-700/50 transition-colors">
                            <td class="p-4">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        class="h-16 w-24 object-cover rounded border border-gray-600 shadow-sm">
                                @else
                                    <div
                                        class="h-16 w-24 bg-gray-700 rounded flex items-center justify-center text-xs text-gray-500 border border-gray-600">
                                        No IMG</div>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-gray-200 text-base">{{ $item->title }}</div>
                                @if ($item->price)
                                    <div class="text-xs text-green-400 font-mono mt-1">Rp
                                        {{ number_format($item->price, 0, ',', '.') }}</div>
                                @endif
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $item->category == 'Wisata'
                                ? 'bg-purple-900 text-purple-300 border border-purple-700'
                                : ($item->category == 'Produk'
                                    ? 'bg-green-900 text-green-300 border border-green-700'
                                    : 'bg-blue-900 text-blue-300 border border-blue-700') }}">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-400 max-w-xs truncate">
                                {{ Str::limit(strip_tags($item->description), 50) }}
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.potentials.edit', $item->id) }}"
                                    class="inline-block text-blue-400 hover:text-blue-300 font-medium transition">Edit</a>

                                <form action="{{ route('admin.potentials.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus potensi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-400 hover:text-red-300 font-medium transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic bg-gray-800 rounded-lg">
                                Belum ada data potensi desa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $potentials->links() }}
        </div>
    </div>
@endsection
