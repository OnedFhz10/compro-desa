@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Berita & Artikel</h3>
            <a href="{{ route('admin.posts.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Berita
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider border-b border-gray-200">
                        <th class="p-4 font-semibold">Gambar</th>
                        <th class="p-4 font-semibold">Judul & Penulis</th>
                        <th class="p-4 font-semibold">Kategori</th>
                        <th class="p-4 font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        class="h-12 w-20 object-cover rounded shadow-sm">
                                @else
                                    <div
                                        class="h-12 w-20 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">
                                        No IMG</div>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-semibold text-gray-800 line-clamp-1">{{ $post->title }}</div>
                                <div class="text-xs text-gray-500 mt-1">Oleh: {{ $post->user->name ?? 'Admin' }}</div>
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-3 py-1 text-xs font-medium rounded-full 
                            {{ $post->category->name == 'Pengumuman' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $post->category->name ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600">
                                {{ $post->created_at->format('d M Y') }}
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    class="inline-block text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic bg-gray-50 rounded-lg">
                                Belum ada berita yang diterbitkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Link --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
