@extends('layouts.admin')

@section('title', 'Data APBDes & Transparansi')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Data Transparansi Anggaran</h2>
            <a href="{{ route('admin.budgets.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                + Tambah Data
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
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($budgets as $item)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4 font-bold">{{ $item->year }}</td>
                            <td class="px-6 py-4">
                                @if ($item->category == 'apbdes')
                                    <span
                                        class="bg-blue-900 text-blue-300 px-2 py-1 rounded text-xs uppercase font-bold border border-blue-700">APBDes</span>
                                @elseif($item->category == 'realisasi')
                                    <span
                                        class="bg-green-900 text-green-300 px-2 py-1 rounded text-xs uppercase font-bold border border-green-700">Realisasi</span>
                                @else
                                    <span
                                        class="bg-purple-900 text-purple-300 px-2 py-1 rounded text-xs uppercase font-bold border border-purple-700">Laporan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $item->description }}</td>
                            <td class="px-6 py-4">
                                @if ($item->type == 'income')
                                    <span class="text-green-400 font-medium">Pendapatan</span>
                                @else
                                    <span class="text-red-400 font-medium">Belanja</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-white">
                                Rp {{ number_format($item->amount, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                @if ($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                        class="text-gray-400 hover:text-white" title="Lihat File">
                                        📎
                                    </a>
                                @endif
                                <a href="{{ route('admin.budgets.edit', $item->id) }}"
                                    class="text-blue-400 hover:text-blue-300">Edit</a>
                                <form action="{{ route('admin.budgets.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada data anggaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $budgets->links() }}
        </div>
    </div>
@endsection
