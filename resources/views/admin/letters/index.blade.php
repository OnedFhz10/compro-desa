@extends('layouts.admin')

@section('title', 'Permohonan Surat')

@section('content')

    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">Daftar Pengajuan Surat</h3>
            {{-- Bisa ditambah filter status disini nanti --}}
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-400 uppercase text-xs tracking-wider border-b border-gray-600">
                        <th class="p-4 font-semibold">Pemohon</th>
                        <th class="p-4 font-semibold">Jenis Surat</th>
                        <th class="p-4 font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @forelse($letters as $letter)
                        <tr class="hover:bg-gray-700/50 transition-colors">
                            <td class="p-4">
                                <div class="font-semibold text-gray-200">
                                    {{ $letter->nama_pemohon ?? ($letter->user->name ?? '-') }}</div>
                                <div class="text-xs text-gray-500">NIK: {{ $letter->nik_pemohon ?? '-' }}</div>
                            </td>
                            <td class="p-4 text-gray-300">
                                {{ $letter->jenis_surat }}
                            </td>
                            <td class="p-4 text-gray-400">
                                {{ $letter->created_at->format('d M Y H:i') }}
                                <div class="text-xs">{{ $letter->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="p-4">
                                @if ($letter->status == 'pending')
                                    <span
                                        class="px-2 py-1 rounded text-xs font-bold bg-yellow-900 text-yellow-300 border border-yellow-700">Pending</span>
                                @elseif($letter->status == 'diproses')
                                    <span
                                        class="px-2 py-1 rounded text-xs font-bold bg-blue-900 text-blue-300 border border-blue-700">Diproses</span>
                                @elseif($letter->status == 'selesai')
                                    <span
                                        class="px-2 py-1 rounded text-xs font-bold bg-green-900 text-green-300 border border-green-700">Selesai</span>
                                @elseif($letter->status == 'ditolak')
                                    <span
                                        class="px-2 py-1 rounded text-xs font-bold bg-red-900 text-red-300 border border-red-700">Ditolak</span>
                                @endif
                            </td>
                            <td class="p-4 text-right">
                                <a href="{{ route('admin.letters.show', $letter->id) }}"
                                    class="inline-block px-3 py-1 bg-blue-600 hover:bg-blue-500 text-white rounded text-xs font-medium transition mr-2">
                                    Proses
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic bg-gray-800 rounded-lg">
                                Belum ada pengajuan surat masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Dark Mode --}}
        <div class="mt-6">
            {{ $letters->links() }}
            {{-- Note: Jika pagination default Laravel warnanya putih, kita perlu publish vendor pagination atau bungkus div ini dengan class 'dark' jika menggunakan tailwind --}}
        </div>
    </div>
@endsection
