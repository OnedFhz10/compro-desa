@extends('layouts.admin')

@section('title', 'Manajemen Agenda')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">Daftar Agenda Kegiatan</h2>
                <p class="text-gray-400 text-sm">Kelola jadwal kegiatan dan acara desa.</p>
            </div>
            <a href="{{ route('admin.agendas.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Agenda
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Kegiatan</th>
                        <th class="px-6 py-3">Waktu & Lokasi</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($agendas as $agenda)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4">
                                <div
                                    class="flex flex-col items-center justify-center bg-gray-700 rounded-lg w-12 h-12 text-center border border-gray-600">
                                    <span
                                        class="text-xs font-bold uppercase text-gray-400">{{ $agenda->date->format('M') }}</span>
                                    <span
                                        class="text-lg font-bold text-white leading-none">{{ $agenda->date->format('d') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-white text-base">{{ $agenda->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $agenda->description }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-2 text-gray-300">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $agenda->time }}
                                </div>
                                <div class="flex items-center gap-2 text-gray-400 mt-1">
                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $agenda->location }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($agenda->date->isPast())
                                    <span
                                        class="bg-gray-700 text-gray-400 px-2 py-1 rounded text-xs border border-gray-600">Selesai</span>
                                @else
                                    <span
                                        class="bg-green-900 text-green-300 px-2 py-1 rounded text-xs border border-green-700 animate-pulse">Akan
                                        Datang</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.agendas.edit', $agenda->id) }}"
                                    class="text-yellow-500 hover:text-yellow-400 text-sm font-medium">Edit</a>
                                <form action="{{ route('admin.agendas.destroy', $agenda->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus agenda ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-400 text-sm font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p>Belum ada agenda kegiatan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $agendas->links() }}</div>
    </div>
@endsection
