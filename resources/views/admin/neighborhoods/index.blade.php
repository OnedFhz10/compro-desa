@extends('layouts.admin')
@section('title', 'Data RT/RW')
@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Data Wilayah (RT/RW)</h2>
            <a href="{{ route('admin.neighborhoods.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Tambah Data</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Dusun</th>
                        <th class="px-6 py-3">RW</th>
                        <th class="px-6 py-3">RT</th>
                        <th class="px-6 py-3">Ketua</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($neighborhoods as $rt)
                        <tr class="hover:bg-gray-700/50">
                            <td class="px-6 py-4">{{ $rt->dusun }}</td>
                            <td class="px-6 py-4">{{ $rt->rw }}</td>
                            <td class="px-6 py-4">{{ $rt->rt }}</td>
                            <td class="px-6 py-4">{{ $rt->head_name }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.neighborhoods.edit', $rt->id) }}" class="text-blue-400">Edit</a>
                                <form action="{{ route('admin.neighborhoods.destroy', $rt->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Hapus?');">@csrf @method('DELETE')<button
                                        class="text-red-400">Hapus</button></form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $neighborhoods->links() }}</div>
    </div>
@endsection
