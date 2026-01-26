@extends('layouts.admin')

@section('title', 'Galeri Foto')

@section('content')

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
        <h3 class="text-xl font-bold text-gray-100">Album Galeri Desa</h3>
        <a href="{{ route('admin.galleries.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium transition flex items-center shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            Upload Foto Baru
        </a>
    </div>

    {{-- Grid Galeri --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $item)
            <div
                class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg border border-gray-700 hover:border-gray-500 transition-all duration-300">

                {{-- Gambar --}}
                <div class="aspect-w-4 aspect-h-3 overflow-hidden bg-gray-900">
                    <img src="{{ asset('storage/' . $item->image_path) }}"
                        class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        alt="{{ $item->title }}">
                </div>

                {{-- Overlay Info (Muncul saat hover di Desktop, selalu ada di Mobile jika mau, tapi ini style clean) --}}
                <div class="p-4">
                    <h4 class="font-bold text-gray-200 text-sm truncate mb-1">{{ $item->title ?? 'Tanpa Judul' }}</h4>
                    <p class="text-xs text-gray-500 line-clamp-1 mb-3">{{ $item->description ?? 'Tidak ada keterangan.' }}
                    </p>

                    <div class="flex justify-between items-center pt-3 border-t border-gray-700">
                        <span class="text-[10px] text-gray-500">{{ $item->created_at->format('d M Y') }}</span>

                        <div class="flex gap-2">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.galleries.edit', $item->id) }}"
                                class="p-1.5 bg-gray-700 hover:bg-blue-600 text-blue-400 hover:text-white rounded transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.galleries.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus foto ini secara permanen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-1.5 bg-gray-700 hover:bg-red-600 text-red-400 hover:text-white rounded transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div
                class="col-span-full py-12 flex flex-col items-center justify-center text-gray-500 bg-gray-800 rounded-xl border border-gray-700 border-dashed">
                <svg class="w-16 h-16 mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <p class="text-lg font-medium">Belum ada foto di galeri.</p>
                <p class="text-sm">Silakan upload foto kegiatan desa Anda.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $galleries->links() }}
    </div>

@endsection
