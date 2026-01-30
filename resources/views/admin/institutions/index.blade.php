@extends('layouts.admin')
@section('title', 'Lembaga Desa')
@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white">Daftar Lembaga Desa</h2>
            <a href="{{ route('admin.institutions.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Tambah Lembaga</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($institutions as $item)
                <div class="bg-gray-700 p-4 rounded-lg flex items-start gap-4">
                    <div class="w-16 h-16 bg-gray-600 rounded flex-shrink-0 overflow-hidden">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-contain">
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold">{{ $item->name }}</h3>
                        <p class="text-xs text-blue-300 mb-2">{{ $item->abbreviation }}</p>
                        <p class="text-gray-400 text-sm line-clamp-2">{{ $item->description }}</p>
                        <form action="{{ route('admin.institutions.destroy', $item->id) }}" method="POST"
                            class="mt-2 text-right">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs hover:text-red-300"
                                onclick="return confirm('Hapus lembaga ini?')">Hapus Lembaga</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
