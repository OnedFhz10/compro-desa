@extends('layouts.admin')

@section('title', 'Potensi Desa')

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
                <h2 class="text-xl font-bold text-white">Data Potensi Desa</h2>
                <p class="text-gray-400 text-sm">Kelola UMKM, Wisata, dan Produk Unggulan</p>
            </div>
            <a href="{{ route('admin.potentials.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Potensi
            </a>
        </div>

        @if($potentials->count() > 0)
            {{-- CARD GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($potentials as $item)
                    <div class="bg-gray-700 rounded-lg overflow-hidden hover:bg-gray-600 transition flex flex-col">
                        {{-- Image --}}
                        <div class="h-40 bg-gray-600">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" 
                                    alt="{{ $item->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-4 flex flex-col flex-1">
                            {{-- Category Badge --}}
                            <span class="inline-block px-2 py-1 bg-amber-900 text-amber-300 text-xs rounded font-bold uppercase mb-2 self-start">
                                {{ $item->category }}
                            </span>

                            {{-- Title --}}
                            <h3 class="font-bold text-white text-lg mb-2 line-clamp-2">{{ $item->title }}</h3>

                            {{-- Address --}}
                            @if($item->address)
                                <p class="text-gray-400 text-xs mb-3 flex items-start gap-1">
                                    <svg class="w-3 h-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="line-clamp-2">{{ $item->address }}</span>
                                </p>
                            @endif

                            {{-- Actions --}}
                            <div class="flex items-center gap-2 pt-3 mt-auto border-t border-gray-600">
                                <a href="{{ route('admin.potentials.edit', $item->id) }}" 
                                    class="text-yellow-400 text-sm hover:text-yellow-300 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <span class="text-gray-600">•</span>
                                <form action="{{ route('admin.potentials.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 text-sm hover:text-red-300 flex items-center gap-1"
                                        onclick="return confirm('Hapus data ini?')">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $potentials->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-gray-700 rounded-lg p-12 text-center">
                <div class="text-6xl mb-4">🌾</div>
                <h3 class="text-lg font-bold text-gray-300 mb-2">Belum Ada Data Potensi</h3>
                <p class="text-gray-500 text-sm">Klik tombol "Tambah Potensi" untuk menambahkan data UMKM, wisata, atau produk unggulan.</p>
            </div>
        @endif
    </div>
@endsection
