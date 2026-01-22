@extends('layouts.app')
@section('title', 'Pengumuman Desa')
@section('content')

    {{-- HEADER --}}
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-blue-900/20"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="text-orange-400 font-bold tracking-widest text-sm uppercase">Papan Informasi</span>
            <h1 class="text-3xl lg:text-5xl font-extrabold text-white mt-2">Pengumuman Terbaru</h1>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
            @forelse($posts as $post)
                <div class="bg-white rounded-2xl p-6 mb-6 shadow-sm border-l-4 border-orange-500 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-orange-100 text-orange-600 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-xl">
                            📢
                        </div>
                        <div class="flex-grow">
                            <span
                                class="text-xs text-slate-400 font-bold uppercase">{{ $post->created_at->format('d F Y') }}</span>
                            <h3 class="text-xl font-bold text-slate-800 mb-2 hover:text-orange-600 transition">
                                <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20">
                    <p class="text-slate-500">Belum ada pengumuman saat ini.</p>
                </div>
            @endforelse

            <div class="mt-8">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection
