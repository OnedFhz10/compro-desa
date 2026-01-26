@extends('layouts.admin')

@section('title', 'Perangkat Desa')

@section('content')

    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">Struktur Pemerintahan</h3>
            <a href="{{ route('admin.officials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Perangkat
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
                                    {{ $official->position }}</div>
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
@endsection
