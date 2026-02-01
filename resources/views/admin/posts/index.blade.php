@extends('layouts.admin')

{{-- Gunakan ?? '' untuk mencegah error Undefined Variable --}}
@php
    $currentCategory = $activeCategory ?? null;
    $pageTitle = $currentCategory
        ? ucfirst($currentCategory == 'berita' ? 'Berita Desa' : 'Pengumuman')
        : 'Berita & Artikel';
@endphp

@section('title', 'Manajemen ' . $pageTitle)

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">
                    Daftar {{ $pageTitle }}
                </h2>
                <p class="text-gray-400 text-sm">Kelola konten informasi publik desa.</p>
            </div>

            {{-- TOMBOL TAMBAH --}}
            <a href="{{ route('admin.posts.create', ['category' => $currentCategory]) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah {{ $currentCategory ? ucfirst($currentCategory == 'berita' ? 'Berita' : 'Pengumuman') : 'Data' }}
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
                                <div class="w-14 h-14 rounded-lg overflow-hidden bg-gray-600 border border-gray-600">
                                    @if ($post->image_path)
                                        <img src="{{ asset('storage/' . $post->image_path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No
                                            IMG</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-white text-sm line-clamp-2">{{ $post->title }}</div>
                                <div class="text-xs text-gray-500 mt-1">Penulis: {{ $post->user->name ?? 'Admin' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($post->category && $post->category->slug == 'pengumuman')
                                    <span
                                        class="bg-purple-900 text-purple-300 px-2 py-1 rounded text-[10px] uppercase font-bold border border-purple-700">
                                        Pengumuman
                                    </span>
                                @elseif($post->category)
                                    <span
                                        class="bg-blue-900 text-blue-300 px-2 py-1 rounded text-[10px] uppercase font-bold border border-blue-700">
                                        {{ $post->category->name }}
                                    </span>
                                @else
                                    <span
                                        class="bg-gray-700 text-gray-300 px-2 py-1 rounded text-[10px]">Uncategorized</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    class="text-yellow-500 hover:text-yellow-400 text-sm font-medium">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus data ini?');">
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
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                        </path>
                                    </svg>
                                    <p>Belum ada data.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
@endsection
