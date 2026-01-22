@extends('layouts.app')
@section('title', 'Lembaga Desa')
@section('content')

    <div class="bg-slate-900 py-20 text-center relative">
        <div class="absolute inset-0 bg-blue-900/20"></div>
        <div class="relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-4">Lembaga Kemasyarakatan</h1>
            <p class="text-slate-300">Mitra strategis dalam pembangunan dan pemberdayaan.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($institutions as $item)
                    <a href="{{ route('public.institution.show', Str::slug($item->name)) }}"
                        class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition border border-gray-100 flex flex-col items-center text-center group">
                        <div
                            class="w-24 h-24 rounded-full bg-blue-50 flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" class="w-16 h-16 object-contain">
                            @else
                                <span class="text-4xl">🏢</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition">
                            {{ $item->name }}</h3>
                        <p class="text-slate-500 text-sm line-clamp-2 mb-6">{{ $item->description }}</p>
                        <span class="text-blue-600 text-sm font-bold mt-auto group-hover:underline">Lihat Profil →</span>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-slate-500">Belum ada data lembaga.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
