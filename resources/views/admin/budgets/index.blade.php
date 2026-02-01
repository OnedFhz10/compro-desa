@extends('layouts.admin')

@section('title', 'Transparansi Anggaran')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-xl font-bold text-white">Transparansi Anggaran</h2>
                <p class="text-gray-400 text-sm">Kelola data APBDes, Realisasi, dan Laporan Keuangan.</p>
            </div>
            <a href="{{ route('admin.budgets.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Data
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Tahun</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Uraian</th>
                        <th class="px-6 py-3">Jenis</th>
                        <th class="px-6 py-3 text-right">Nominal</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($budgets as $item)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4 font-bold">{{ $item->year }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs rounded border 
                                    {{ $item->category == 'apbdes'
                                        ? 'bg-purple-900 text-purple-300 border-purple-700'
                                        : ($item->category == 'realisasi'
                                            ? 'bg-blue-900 text-blue-300 border-blue-700'
                                            : 'bg-gray-700 border-gray-600') }}">
                                    {{ $item->category_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">{{ $item->description }}</div>
                                @if ($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                        class="text-blue-400 hover:underline text-xs flex items-center gap-1 mt-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                        Lihat File
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->type == 'income')
                                    <span class="flex items-center gap-1 text-emerald-400 text-xs font-bold uppercase">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                        </svg>
                                        Pendapatan
                                    </span>
                                @else
                                    <span class="flex items-center gap-1 text-red-400 text-xs font-bold uppercase">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                        </svg>
                                        Belanja
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-white">
                                {{ $item->formatted_amount }}
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('admin.budgets.edit', $item->id) }}"
                                    class="text-yellow-500 hover:text-yellow-400 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.budgets.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin hapus data ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-400 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p>Belum ada data anggaran.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $budgets->links() }}</div>
    </div>
@endsection
