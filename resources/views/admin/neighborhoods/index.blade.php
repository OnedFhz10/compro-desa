@extends('layouts.admin')

@section('title', 'Data RT/RW')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow border border-gray-700 p-5">

        <div class="flex justify-between items-center mb-5">
            <h3 class="font-semibold text-gray-200">Daftar Ketua RT</h3>
            <a href="{{ route('admin.neighborhoods.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-sm font-medium transition flex items-center">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah RT
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-400 text-xs uppercase border-b border-gray-600">
                        <th class="px-4 py-2 font-semibold">Wilayah</th>
                        <th class="px-4 py-2 font-semibold">RW</th>
                        <th class="px-4 py-2 font-semibold">RT</th>
                        <th class="px-4 py-2 font-semibold">Ketua RT</th>
                        <th class="px-4 py-2 font-semibold">HP</th>
                        <th class="px-4 py-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse ($neighborhoods as $item)
                        <tr class="hover:bg-gray-750 transition">
                            <td class="px-4 py-2.5 text-gray-300">{{ $item->dusun }}</td>
                            <td class="px-4 py-2.5 text-gray-300">RW {{ $item->rw }}</td>
                            <td class="px-4 py-2.5 font-bold text-blue-400">RT {{ $item->rt }}</td>
                            {{-- PERBAIKAN: Memanggil head_name --}}
                            <td class="px-4 py-2.5 text-gray-100 font-medium">{{ $item->head_name }}</td>
                            <td class="px-4 py-2.5 text-gray-400 text-xs">{{ $item->phone ?? '-' }}</td>
                            <td class="px-4 py-2.5 text-right space-x-2">
                                <a href="{{ route('admin.neighborhoods.edit', $item->id) }}"
                                    class="text-blue-400 hover:text-blue-300 text-xs font-medium">Edit</a>
                                <form action="{{ route('admin.neighborhoods.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-400 hover:text-red-300 text-xs font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500 text-sm italic">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $neighborhoods->links() }}
        </div>
    </div>
@endsection
