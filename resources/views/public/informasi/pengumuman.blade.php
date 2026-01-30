@extends('layouts.app')

@section('title', 'Pengumuman Desa')

@section('content')
    <div class="bg-blue-600 py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-4">Pengumuman</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Informasi penting dan pemberitahuan resmi dari pemerintah desa.
            </p>
        </div>
    </div>

    <div class="bg-white py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            @if ($posts->count() > 0)
                <div class="space-y-6 max-w-4xl mx-auto">
                    @foreach ($posts as $post)
                        <div
                            class="bg-white rounded-2xl p-6 md:p-8 border border-gray-200 shadow-lg shadow-gray-100 hover:border-blue-300 transition duration-300 flex flex-col md:flex-row gap-6">

                            {{-- Tanggal (Box Kiri) --}}
                            <div
                                class="flex-shrink-0 flex md:flex-col items-center justify-center bg-blue-50 text-blue-600 rounded-xl p-4 w-full md:w-24 text-center border border-blue-100">
                                <span
                                    class="text-3xl font-bold block leading-none">{{ $post->created_at->format('d') }}</span>
                                <span
                                    class="text-xs font-bold uppercase tracking-wider">{{ $post->created_at->translatedFormat('M Y') }}</span>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-slate-900 mb-3 hover:text-blue-600 transition">
                                    <a href="{{ route('public.news.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-slate-600 mb-4 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->content), 200) }}
                                </p>

                                {{-- PERBAIKAN: Gunakan image_path --}}
                                @if ($post->image_path)
                                    <div class="mb-4">
                                        <a href="{{ asset('storage/' . $post->image_path) }}" target="_blank"
                                            class="inline-flex items-center gap-2 text-sm text-blue-600 hover:underline bg-blue-50 px-3 py-1.5 rounded-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            Lihat Lampiran Gambar
                                        </a>
                                    </div>
                                @endif

                                <a href="{{ route('public.news.show', $post->slug) }}"
                                    class="text-sm font-bold text-slate-800 hover:text-blue-600 transition">
                                    Baca Detail &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="text-6xl mb-4">📢</div>
                    <h3 class="text-xl font-bold text-slate-600">Tidak ada pengumuman saat ini</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
