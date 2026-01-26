@extends('layouts.admin')

@section('title', 'Data RT/RW')

@section('content')
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-white">Data Wilayah & Ketua RT</h3>
            <a href="{{ route('admin.neighborhoods.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah RT
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-700 text-gray-400 uppercase text-xs">
                    <tr>
                        <th class="p-3">Dusun</th>
                        <th class="p-3">RW</th>
                        <th class="p-3">RT</th>
                        <th class="p-3">Nama Ketua</th>
                        <th class="p-3">Kontak</th>
                        <th class="p-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 text-sm">
                    @foreach ($neighborhoods as $rt)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                            <td class="p-3 font-medium text-blue-400">{{ $rt->dusun }}</td>
                            <td class="p-3">RW {{ $rt->rw }}</td>
                            <td class="p-3 font-bold">RT {{ $rt->rt }}</td>
                            <td class="p-3">{{ $rt->name }}</td>
                            <td class="p-3 text-xs">{{ $rt->phone ?? '-' }}</td>
                            <td class="p-3 text-right">
                                <form action="{{ route('admin.neighborhoods.destroy', $rt->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $neighborhoods->links() }}</div>
    </div>
@endsection
