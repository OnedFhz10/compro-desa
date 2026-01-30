@extends('layouts.admin')
@section('title', 'Galeri Foto')
@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Galeri Kegiatan</h2>
            <a href="{{ route('admin.galleries.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Upload Foto</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($galleries as $gallery)
                <div class="group relative bg-gray-700 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="w-full h-40 object-cover">
                    <div
                        class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                        <a href="{{ route('admin.galleries.edit', $gallery->id) }}"
                            class="p-2 bg-yellow-500 text-white rounded">✏️</a>
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                            onsubmit="return confirm('Hapus foto ini?');">
                            @csrf @method('DELETE')
                            <button class="p-2 bg-red-600 text-white rounded">🗑️</button>
                        </form>
                    </div>
                    <div class="p-2">
                        <p class="text-xs text-white truncate">{{ $gallery->title ?? 'Tanpa Judul' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 py-10">Belum ada foto.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
@endsection
