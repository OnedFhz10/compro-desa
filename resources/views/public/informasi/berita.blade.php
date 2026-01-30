@extends('layouts.app')

@section('title', 'Berita & Artikel')

@section('content')
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-4">Kabar Desa</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Informasi terbaru seputar desa.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                            <div class="relative h-60 overflow-hidden bg-slate-200">
                                <span
                                    class="absolute top-4 left-4 bg-white/90 text-blue-700 text-xs font-bold px-3 py-1 rounded-full z-10 shadow-sm uppercase">
                                    {{ $post->category?->name ?? 'Berita' }}
                                </span>

                                {{-- PERBAIKAN: image_path --}}
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold">No
                                        Image</div>
                                @endif
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-xs text-slate-400 mb-3">{{ $post->created_at->translatedFormat('d F Y') }}
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 leading-snug hover:text-blue-600 transition">
                                    <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                </p>
                                <a href="{{ route('public.news.show', $post->slug) }}"
                                    class="text-blue-600 font-bold text-sm hover:underline mt-auto">Baca Selengkapnya
                                    &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-12">{{ $posts->links() }}</div>
            @else
                <div class="text-center py-20">
                    <h3 class="text-xl font-bold text-slate-600">Belum ada berita terbaru</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
