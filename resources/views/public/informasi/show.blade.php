@extends('layouts.app')

@section('title', $post->title)

@section('content')

    {{-- BREADCRUMB HEADER --}}
    <div class="bg-slate-900 pt-10 pb-20 relative">
        <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">

            {{-- LOGIKA TOMBOL KEMBALI DINAMIS --}}
            @if ($post->category->name === 'Pengumuman')
                <a href="{{ route('public.announcements') }}"
                    class="inline-flex items-center text-orange-300 hover:text-white mb-4 text-sm font-bold transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                        </path>
                    </svg>
                    Kembali ke Pengumuman
                </a>
            @else
                <a href="{{ route('public.news') }}"
                    class="inline-flex items-center text-blue-300 hover:text-white mb-4 text-sm font-bold transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Berita
                </a>
            @endif

            <h1 class="text-2xl lg:text-4xl font-extrabold text-white leading-tight max-w-4xl mx-auto mb-6">
                {{ $post->title }}
            </h1>

            <div class="flex flex-wrap justify-center items-center gap-4 text-sm text-slate-400">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ $post->created_at->format('d F Y') }}
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-slate-600"></span>
                <span
                    class="flex items-center font-bold {{ $post->category->name === 'Pengumuman' ? 'text-orange-400' : 'text-emerald-400' }}">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    {{ $post->category->name }}
                </span>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 -mt-12 pb-20 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- KOLOM KIRI: ARTIKEL UTAMA --}}
            <div class="lg:col-span-2">
                <article class="bg-white rounded-3xl p-6 lg:p-10 shadow-xl shadow-slate-200/50 border border-gray-100">

                    {{-- Featured Image --}}
                    @if ($post->image_path)
                        <div class="rounded-2xl overflow-hidden mb-8 shadow-sm">
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-auto object-cover">
                        </div>
                    @endif

                    {{-- Isi Berita (Typography Plugin Style) --}}
                    <div
                        class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-a:text-blue-600 hover:prose-a:text-blue-500 prose-img:rounded-xl">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    {{-- Share Section (Dummy) --}}
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h4 class="font-bold text-slate-800 mb-4">Bagikan Informasi:</h4>
                        <div class="flex gap-2">
                            <button
                                class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-blue-700 transition">Facebook</button>
                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-green-600 transition">WhatsApp</button>
                            <button
                                class="bg-sky-500 text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-sky-600 transition">Twitter</button>
                        </div>
                    </div>
                </article>
            </div>

            {{-- KOLOM KANAN: SIDEBAR BERITA TERBARU --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-3xl p-6 shadow-lg shadow-slate-200/50 border border-gray-100">
                        <h3 class="font-bold text-lg text-slate-800 mb-6 pb-4 border-b border-gray-100">
                            Informasi Terbaru Lainnya
                        </h3>

                        <div class="space-y-6">
                            @foreach ($recentPosts as $recent)
                                @if ($recent->id != $post->id)
                                    <a href="{{ route('public.news.show', $recent->slug) }}"
                                        class="group flex items-start gap-4">
                                        {{-- Gambar Kecil --}}
                                        <div
                                            class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 bg-slate-100 border border-gray-100">
                                            @if ($recent->image_path)
                                                <img src="{{ asset('storage/' . $recent->image_path) }}"
                                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                            @else
                                                <div
                                                    class="w-full h-full flex items-center justify-center text-slate-300 text-xs font-bold">
                                                    No Img</div>
                                            @endif
                                        </div>

                                        {{-- Teks --}}
                                        <div>
                                            <span
                                                class="text-[10px] font-bold uppercase mb-1 block {{ $recent->category->name === 'Pengumuman' ? 'text-orange-600' : 'text-blue-600' }}">
                                                {{ $recent->category->name }}
                                            </span>
                                            <h4
                                                class="text-sm font-bold text-slate-800 leading-snug group-hover:text-blue-600 transition line-clamp-2">
                                                {{ $recent->title }}
                                            </h4>
                                            <span
                                                class="text-xs text-slate-400 mt-2 block">{{ $recent->created_at->diffForHumans() }}</span>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                            @if ($post->category->name === 'Pengumuman')
                                <a href="{{ route('public.announcements') }}"
                                    class="text-sm font-bold text-orange-600 hover:underline">Lihat Semua Pengumuman
                                    &rarr;</a>
                            @else
                                <a href="{{ route('public.news') }}"
                                    class="text-sm font-bold text-blue-600 hover:underline">Lihat Semua Berita &rarr;</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
