@extends('layouts.admin')
@section('title', 'Galeri Foto')
@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="mb-6 bg-green-600/20 border border-green-600 text-green-200 px-4 py-3 rounded-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">Galeri Kegiatan</h2>
                <p class="text-gray-400 text-sm">Kelola foto dokumentasi kegiatan desa</p>
            </div>
            <a href="{{ route('admin.galleries.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Upload Foto
            </a>
        </div>

        @if($galleries->count() > 0)
            {{-- GRID LAYOUT --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                    <div class="bg-gray-700 rounded-lg overflow-hidden hover:bg-gray-600 transition flex flex-col group">
                        {{-- Image --}}
                        <div class="h-48 bg-gray-600 relative overflow-hidden">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                                alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            {{-- Overlay on Hover --}}
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" 
                                        class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="p-3 flex-1 flex flex-col">
                            <p class="text-white font-medium text-sm line-clamp-2 flex-1">
                                {{ $gallery->title ?? 'Tanpa Judul' }}
                            </p>
                            @if($gallery->description)
                                <p class="text-gray-400 text-xs mt-1 line-clamp-1">
                                    {{ $gallery->description }}
                                </p>
                            @endif
                            <p class="text-gray-500 text-xs mt-2">
                                {{ $gallery->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-gray-700 rounded-lg p-12 text-center">
                <div class="flex flex-col items-center">
                    <svg class="w-16 h-16 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-lg font-bold text-gray-300 mb-2">Belum Ada Foto</h3>
                    <p class="text-gray-500 text-sm">Klik tombol "Upload Foto" untuk menambahkan foto ke galeri.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
