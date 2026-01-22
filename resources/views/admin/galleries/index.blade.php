@extends('layouts.admin')

@section('title', 'Galeri Foto')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Album Desa</h2>
        <a href="{{ route('admin.galleries.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
            + Upload Foto
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($galleries as $item)
            <div class="bg-white rounded shadow overflow-hidden group relative">
                <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-40 object-cover">

                {{-- Overlay Judul --}}
                <div class="p-2">
                    <p class="text-sm font-bold truncate">{{ $item->title ?? 'Tanpa Judul' }}</p>
                </div>

                {{-- Tombol Hapus (Muncul saat hover) --}}
                <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                    <form action="{{ route('admin.galleries.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus foto ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10 bg-gray-50 text-gray-500 border-dashed border-2">
                Belum ada foto di galeri.
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $galleries->links() }}</div>
@endsection
