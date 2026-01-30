@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Berita</h2>
            <a href="{{ route('admin.posts.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                + Tambah Berita
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-gray-300">
                <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                    <tr>
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="w-14 h-14 rounded-lg bg-gray-600 overflow-hidden border border-gray-600">
                                    {{-- PERBAIKAN: image_path --}}
                                    @if ($post->image_path)
                                        <img src="{{ asset('storage/' . $post->image_path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-xs text-gray-400">No
                                            Img</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-white">{{ Str::limit($post->title, 40) }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-900 text-blue-300 px-2 py-1 rounded text-xs border border-blue-700">
                                    {{ $post->category->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    class="text-yellow-500 hover:text-yellow-400 text-sm">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus berita ini?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-400 text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
@endsection
