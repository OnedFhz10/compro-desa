@extends('layouts.admin')

@section('title', 'Lembaga Desa')

@section('content')
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-white">Daftar Lembaga Desa</h3>
            <a href="{{ route('admin.institutions.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                + Tambah Lembaga
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($institutions as $item)
                <div
                    class="bg-gray-900 rounded-xl border border-gray-600 p-5 flex flex-col items-center text-center group hover:border-blue-500 transition">
                    <div
                        class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center mb-4 overflow-hidden border border-gray-700">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-3xl">🏢</span>
                        @endif
                    </div>
                    <h4 class="text-lg font-bold text-white mb-1">{{ $item->name }}</h4>
                    <p class="text-xs text-gray-400 mb-4 line-clamp-2">{{ $item->description }}</p>

                    <div class="mt-auto flex gap-2 w-full pt-4 border-t border-gray-800">
                        <form action="{{ route('admin.institutions.destroy', $item->id) }}" method="POST" class="w-full"
                            onsubmit="return confirm('Hapus lembaga ini?');">
                            @csrf @method('DELETE')
                            <button
                                class="w-full py-1.5 text-xs text-red-400 hover:text-red-300 hover:bg-red-900/30 rounded transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500">Belum ada data lembaga.</div>
            @endforelse
        </div>
    </div>
@endsection
