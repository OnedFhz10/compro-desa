@extends('layouts.admin')
@section('title', 'Lembaga Desa')
@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="mb-6 bg-green-600/20 border border-green-600 text-green-200 px-4 py-3 rounded-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Lembaga Desa</h2>
            <a href="{{ route('admin.institutions.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">+ Tambah Lembaga</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($institutions as $item)
                <div class="bg-gray-700 p-4 rounded-lg flex items-start gap-4">
                    <div class="w-16 h-16 bg-gray-600 rounded flex-shrink-0 overflow-hidden flex items-center justify-center">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-contain">
                        @else
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold">{{ $item->name }}</h3>
                        @if ($item->abbreviation)
                            <p class="text-xs text-blue-300 mb-2">{{ $item->abbreviation }}</p>
                        @endif
                        <p class="text-gray-400 text-sm line-clamp-2">{{ $item->description ?? 'Belum ada deskripsi' }}</p>
                        
                        {{-- Action Buttons --}}
                        <div class="mt-3 flex items-center gap-2">
                            <a href="{{ route('admin.institutions.edit', $item->id) }}"
                                class="text-blue-400 text-xs hover:text-blue-300 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                            <span class="text-gray-600">•</span>
                            <form action="{{ route('admin.institutions.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 text-xs hover:text-red-300 flex items-center gap-1"
                                    onclick="return confirm('Hapus lembaga ini?')">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
