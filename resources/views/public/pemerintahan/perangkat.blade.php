@extends('layouts.app')
@section('title', 'Perangkat Desa')
@section('content')

    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Aparatur Desa</h1>
            <p class="text-slate-400 text-lg">Mengenal jajaran perangkat desa yang siap melayani masyarakat.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($officials as $staff)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 group border border-gray-100">
                        {{-- Foto --}}
                        <div class="relative h-80 overflow-hidden bg-slate-200">
                            @if ($staff->image_path)
                                <img src="{{ asset('storage/' . $staff->image_path) }}"
                                    class="w-full h-full object-cover object-top transition duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60">
                            </div>

                            {{-- Nama di atas Foto --}}
                            <div class="absolute bottom-0 left-0 w-full p-6 text-white">
                                <h3 class="text-xl font-bold leading-tight">{{ $staff->name }}</h3>
                                <p class="text-blue-300 text-sm font-semibold uppercase tracking-wider mt-1">
                                    {{ $staff->position }}</p>
                            </div>
                        </div>

                        {{-- Info Tambahan --}}
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-sm text-slate-500 mb-2">
                                <span
                                    class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">NIP</span>
                                <span>{{ $staff->nip ?? '-' }}</span>
                            </div>
                            @if ($staff->phone)
                                <div class="pt-4 mt-2 border-t border-gray-100">
                                    <a href="https://wa.me/{{ $staff->phone }}"
                                        class="block w-full text-center bg-slate-900 text-white py-2 rounded-xl text-sm font-bold hover:bg-blue-600 transition">
                                        Hubungi
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-20">
                        <p class="text-slate-500">Data perangkat desa belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
