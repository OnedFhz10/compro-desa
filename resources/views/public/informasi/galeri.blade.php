@extends('layouts.app')

@section('title', 'Galeri Desa')

@section('content')

    {{-- HEADER --}}
    <div class="bg-slate-950 py-20 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-purple-600 rounded-full blur-[150px] opacity-20 translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-80 h-80 bg-blue-600 rounded-full blur-[150px] opacity-20 -translate-x-1/3 translate-y-1/3">
        </div>

        <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Album Kegiatan</h1>
            <p class="text-slate-400 text-lg">Rekam jejak visual pembangunan dan kemeriahan warga desa.</p>
        </div>
    </div>

    {{-- GALLERY GRID --}}
    <div class="bg-slate-900 min-h-screen py-12">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse($galleries as $item)
                    <div class="group relative mb-4 break-inside-avoid rounded-2xl overflow-hidden cursor-pointer">
                        {{-- Image --}}
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                            class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700 ease-in-out">

                        {{-- Overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6">
                            <h3
                                class="text-white font-bold text-lg leading-tight mb-1 translate-y-4 group-hover:translate-y-0 transition duration-300 delay-75">
                                {{ $item->title ?? 'Tanpa Judul' }}</h3>
                            @if ($item->description)
                                <p
                                    class="text-gray-300 text-xs translate-y-4 group-hover:translate-y-0 transition duration-300 delay-100 line-clamp-2">
                                    {{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-slate-500">Belum ada foto yang diunggah.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                {{ $galleries->links() }}
            </div>

        </div>
    </div>

@endsection
