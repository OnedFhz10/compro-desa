@extends('layouts.admin')

@php
    // Logic title dipindah ke sini (ideal: di controller/view composer)
    $currentCategory = $activeCategory ?? null;
    $pageTitle = $currentCategory
        ? ucfirst($currentCategory == 'berita' ? 'Berita Desa' : 'Pengumuman')
        : 'Berita & Artikel';
    $addLabel = $currentCategory 
        ? ucfirst($currentCategory == 'berita' ? 'Berita' : 'Pengumuman') 
        : 'Data';
@endphp

@section('title', 'Manajemen ' . $pageTitle)

@section('content')
    {{-- 1. Alert --}}
    <x-ui.alert type="success" :message="session('success')" />

    {{-- 2. Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">
                Daftar {{ $pageTitle }}
            </h2>
            <p class="text-gray-400 text-sm mt-1">Kelola konten informasi publik desa secara terpusat.</p>
        </div>

        <x-ui.button 
            href="{{ route('admin.posts.create', ['category' => $currentCategory]) }}" 
            variant="primary"
            class="shadow-blue-900/20"
        >
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah {{ $addLabel }}
        </x-ui.button>
    </div>

    {{-- 3. Table Section --}}
    <x-admin.table>
        {{-- Slot: Toolbar (Optional) --}}
        {{-- <x-slot:toolbar>Search form here...</x-slot:toolbar> --}}

        {{-- Slot: Head --}}
        <x-slot:head>
            <th class="px-6 py-4">Gambar</th>
            <th class="px-6 py-4">Judul Artikel</th>
            <th class="px-6 py-4">Kategori</th>
            <th class="px-6 py-4">Tanggal</th>
            <th class="px-6 py-4 text-right">Aksi</th>
        </x-slot>

        {{-- Slot: Body --}}
        @forelse($posts as $post)
            <tr class="hover:bg-gray-750/50 transition duration-150 group">
                {{-- Gambar --}}
                <td class="px-6 py-4">
                    <div class="w-14 h-14 rounded-lg overflow-hidden bg-gray-700 border border-gray-600 shadow-sm relative group-hover:scale-105 transition-transform">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-500">
                                <svg class="w-6 h-6 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                </td>

                {{-- Judul --}}
                <td class="px-6 py-4">
                    <div class="font-bold text-white text-sm line-clamp-2 leading-snug group-hover:text-blue-400 transition-colors">
                        {{ $post->title }}
                    </div>
                    <div class="text-xs text-gray-500 mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        {{ $post->user->name ?? 'Admin' }}
                    </div>
                </td>

                {{-- Kategori --}}
                <td class="px-6 py-4">
                    @if ($post->category)
                        @php
                            $color = match($post->category->slug) {
                                'pengumuman' => 'purple',
                                'agenda' => 'yellow',
                                default => 'blue'
                            };
                        @endphp
                        <x-ui.badge :color="$color" :dot="true">
                            {{ $post->category->name }}
                        </x-ui.badge>
                    @else
                        <x-ui.badge color="gray">Uncategorized</x-ui.badge>
                    @endif
                </td>

                {{-- Tanggal --}}
                <td class="px-6 py-4">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-300 font-medium">{{ $post->created_at->format('d M Y') }}</span>
                        <span class="text-xs text-gray-600">{{ $post->created_at->format('H:i') }} WIB</span>
                    </div>
                </td>

                {{-- Aksi --}}
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 group-hover:opacity-100 transition-opacity">
                        <x-ui.button href="{{ route('admin.posts.edit', $post->id) }}" variant="secondary" size="xs">
                            Edit
                        </x-ui.button>
                        
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Hapus data ini?');">
                            @csrf @method('DELETE')
                            <x-ui.button type="submit" variant="danger" size="xs">
                                Hapus
                            </x-ui.button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <x-admin.empty-state 
                message="Belum ada data {{ Str::lower($currentCategory ?? 'berita') }}." 
                description="Mulai dengan menambahkan data baru melalui tombol di atas."
            >
                <x-slot:action>
                    <x-ui.button href="{{ route('admin.posts.create', ['category' => $currentCategory]) }}" size="sm">
                        Buat {{ $addLabel }} Sekarang
                    </x-ui.button>
                </x-slot>
            </x-admin.empty-state>
        @endforelse

        {{-- Slot: Footer --}}
        <x-slot:footer>
            {{ $posts->links() }}
        </x-slot>
    </x-admin.table>
@endsection
