@extends('layouts.admin')

@section('title', 'Perangkat Desa')

@section('content')

    {{-- 1. Alert --}}
    <x-ui.alert type="success" :message="session('success')" />

    {{-- 2. Bagan Struktur Organisasi --}}
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-700 flex items-center gap-3">
            <div class="p-2 bg-blue-500/20 text-blue-400 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white">Bagan Struktur Organisasi</h3>
                <p class="text-sm text-gray-400">Upload gambar struktur organisasi terbaru.</p>
            </div>
        </div>

        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-8 items-start">
                {{-- Preview --}}
                <div class="w-full md:w-1/3 bg-gray-900 rounded-xl p-2 border border-gray-700 shadow-inner">
                    @if ($profile->structure_image_path)
                        <img src="{{ asset('storage/' . $profile->structure_image_path) }}" class="w-full rounded-lg hover:scale-[1.02] transition duration-300">
                    @else
                        <div class="h-48 flex flex-col items-center justify-center text-gray-600 border-2 border-dashed border-gray-700 rounded-lg">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-sm font-medium">Belum ada gambar</span>
                        </div>
                    @endif
                </div>

                {{-- Form --}}
                <div class="flex-1 w-full">
                    <form action="{{ route('admin.officials.structure') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf @method('PUT')
                        
                        <div>
                            <label class="block mb-2 text-sm font-bold text-gray-300">Pilih File Gambar</label>
                            <input type="file" name="structure_image_path" required accept="image/*"
                                class="block w-full text-sm text-gray-400
                                file:mr-4 file:py-2.5 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-600 file:text-white
                                hover:file:bg-blue-700
                                bg-gray-700 border border-gray-600 rounded-lg cursor-pointer focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                                ">
                            <p class="mt-2 text-xs text-gray-500">
                                Format: JPG, PNG. Maksimal 2MB. Pastikan tulisan terbaca jelas.
                            </p>
                        </div>

                        <div class="pt-2">
                            <x-ui.button type="submit" variant="primary">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Simpan Perubahan
                            </x-ui.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. Daftar Personil --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Personil Perangkat Desa</h2>
            <p class="text-sm text-gray-400 mt-1">Kelola data staf dan jabatan perangkat desa.</p>
        </div>
        <x-ui.button href="{{ route('admin.officials.create') }}" variant="primary">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Personil
        </x-ui.button>
    </div>

    @if($officials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($officials as $official)
                <div class="group bg-gray-800 rounded-xl p-5 border border-gray-700 shadow-sm hover:shadow-lg hover:border-blue-500/30 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-3 opacity-0 group-hover:opacity-100 transition-opacity flex gap-2 z-10">
                        <x-ui.button href="{{ route('admin.officials.edit', $official->id) }}" variant="secondary" size="xs" class="!p-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </x-ui.button>
                        <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST" onsubmit="return confirm('Hapus personil ini?');">
                            @csrf @method('DELETE')
                            <x-ui.button type="submit" variant="secondary" size="xs" class="!p-1.5 shadow-sm text-red-500 hover:text-red-600 hover:border-red-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </x-ui.button>
                        </form>
                    </div>

                    <div class="flex items-start gap-4">
                        {{-- Foto --}}
                        <div class="w-20 h-20 bg-gray-700 rounded-xl flex-shrink-0 overflow-hidden shadow-inner border border-gray-600 relative">
                            @if ($official->image_path)
                                <img src="{{ asset('storage/' . $official->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($official->name) }}&background=1f2937&color=9ca3af&size=128" 
                                    class="w-full h-full object-cover">
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0 pt-1">
                            <h3 class="text-white font-bold truncate text-lg group-hover:text-blue-400 transition">{{ $official->name }}</h3>
                            <p class="text-blue-300 text-sm font-medium mb-2">{{ $official->position }}</p>
                            
                            <div class="space-y-1.5">
                                @if($official->nip)
                                     <div class="flex items-center gap-2 text-xs text-gray-400">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                        <span class="font-mono">{{ $official->nip }}</span>
                                    </div>
                                @endif
                                @if($official->phone)
                                    <div class="flex items-center gap-2 text-xs text-gray-400">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        {{ $official->phone }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-admin.empty-state 
            message="Belum Ada Personil" 
            description="Tambahkan data perangkat desa untuk ditampilkan di website."
            icon="users"
        >
             <x-slot:action>
                 <x-ui.button href="{{ route('admin.officials.create') }}">
                    Tambah Personil Pertama
                </x-ui.button>
            </x-slot>
        </x-admin.empty-state>
    @endif

@endsection
