@extends('layouts.admin')

@section('title', 'Layanan Surat')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold text-white mb-6">Daftar Permohonan Surat</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Pemohon</th>
                        <th class="px-6 py-3">Jenis Surat</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($letters as $letter)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4 text-sm">{{ $letter->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-white">{{ $letter->name }}</div>
                                <div class="text-xs text-gray-500">NIK: {{ $letter->nik }}</div>
                            </td>
                            <td class="px-6 py-4">{{ $letter->letter_type }}</td>
                            <td class="px-6 py-4">
                                @if ($letter->status == 'pending')
                                    <span class="bg-yellow-900 text-yellow-300 px-2 py-1 rounded text-xs">Menunggu</span>
                                @elseif($letter->status == 'diproses')
                                    <span class="bg-blue-900 text-blue-300 px-2 py-1 rounded text-xs">Diproses</span>
                                @elseif($letter->status == 'selesai')
                                    <span class="bg-green-900 text-green-300 px-2 py-1 rounded text-xs">Selesai</span>
                                @else
                                    <span class="bg-red-900 text-red-300 px-2 py-1 rounded text-xs">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.letters.show', $letter->id) }}"
                                    class="text-blue-400 hover:text-blue-300 font-medium">Proses</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada permohonan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $letters->links() }}</div>
    </div>
@endsection
