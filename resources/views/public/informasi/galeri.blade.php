@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-purple-900/40 to-slate-900 z-0"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-4">Galeri Desa</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Dokumentasi visual kegiatan dan keindahan desa kami.
            </p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($galleries->count() > 0)
                <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
                    @foreach ($galleries as $gallery)
                        <div
                            class="break-inside-avoid bg-white rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 hover:shadow-xl transition duration-300 group">
                            <div class="relative overflow-hidden">
                                {{-- PERBAIKAN: image_path --}}
                                @if ($gallery->image_path)
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                        class="w-full h-auto transform group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="w-full h-64 bg-slate-200 flex items-center justify-center text-slate-400">No
                                        Image</div>
                                @endif

                                {{-- Overlay Caption --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6">
                                    <h3 class="text-white font-bold text-lg leading-tight">{{ $gallery->title }}</h3>
                                    @if ($gallery->description)
                                        <p class="text-slate-300 text-xs mt-2 line-clamp-2">{{ $gallery->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    {{ $galleries->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="text-6xl mb-4">📷</div>
                    <h3 class="text-xl font-bold text-slate-600">Belum ada foto di galeri</h3>
                </div>
            @endif

        </div>
    </div>
@endsection
