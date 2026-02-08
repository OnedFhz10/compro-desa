@extends('layouts.app')

@section('title', 'Data RT & RW')

@section('content')
    {{-- 1. HERO HEADER --}}
    <section class="relative bg-slate-900 h-[400px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?q=60&w=1200&auto=format&fit=crop"
                alt="Background" class="w-full h-full object-cover opacity-40" width="1200" height="400" loading="eager">
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20 text-center pt-10">
            <span
                class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Wilayah</span>
            <h1
                class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg animate-fade-in-up">
                Data RT & RW
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-in-up">
                Pemetaan administratif wilayah {{ $profile?->village_name ?? 'Desa' }} mulai dari Dusun hingga tingkat RT.
            </p>
        </div>
    </section>

    {{-- 2. CONTENT GRID --}}
    {{-- PERBAIKAN: Padding top ditambah (pt-10) dan margin-top dikurangi (-mt-10) agar turun --}}
    <div class="bg-gray-50 min-h-screen pb-20 relative z-30 -mt-10 pt-10">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- GRID DUSUN --}}
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up animation-delay-500 items-start">

                @forelse ($neighborhoods as $dusun => $rws)
                    {{-- KARTU DUSUN --}}
                    <div
                        class="bg-white rounded-[2rem] p-6 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform duration-300">

                        {{-- Dekorasi Atas --}}
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-blue-700"></div>

                        {{-- Header Dusun --}}
                        <div class="flex items-center gap-4 mb-6 pb-4 border-b border-slate-100">
                            <div
                                class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Wilayah</span>
                                <h2 class="text-xl font-extrabold text-slate-800 leading-none mt-1">Dusun
                                    {{ $dusun }}</h2>
                            </div>
                        </div>

                        {{-- List RW dalam Dusun --}}
                        <div class="space-y-6">
                            @foreach ($rws as $rw => $data_rt)
                                <div class="bg-slate-50/50 rounded-2xl p-4 border border-slate-200/60">

                                    {{-- Header RW --}}
                                    <div class="flex justify-between items-center mb-3">
                                        <h3 class="font-bold text-slate-700 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                            RW {{ $rw }}
                                        </h3>
                                        <span
                                            class="text-[10px] font-bold bg-white border border-slate-200 px-2 py-0.5 rounded-md text-slate-500">
                                            {{ $data_rt->count() }} RT
                                        </span>
                                    </div>

                                    {{-- List RT --}}
                                    @if ($data_rt->count() > 0)
                                        <ul class="space-y-2">
                                            @foreach ($data_rt as $rt)
                                                <li
                                                    class="bg-white p-2.5 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between gap-3 group/rt hover:border-blue-200 transition-colors">

                                                    {{-- Nomor RT --}}
                                                    <div class="flex items-center gap-3 overflow-hidden">
                                                        <span
                                                            class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-slate-100 text-slate-600 font-bold rounded-lg text-xs">
                                                            {{ $rt->rt }}
                                                        </span>
                                                        <div class="flex flex-col min-w-0">
                                                            <span
                                                                class="text-[10px] text-slate-400 uppercase font-medium">Ketua
                                                                RT</span>
                                                            <span
                                                                class="text-xs font-bold text-slate-800 truncate block w-full"
                                                                title="{{ $rt->head_name }}">
                                                                {{ $rt->head_name ?? '-' }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    {{-- Tombol WA --}}
                                                    @if ($rt->phone)
                                                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/\D/', '', $rt->phone)) }}"
                                                            target="_blank"
                                                            class="w-7 h-7 flex-shrink-0 flex items-center justify-center rounded-full bg-green-50 text-green-600 hover:bg-green-500 hover:text-white transition-all"
                                                            title="Chat WA">
                                                            <svg class="w-3.5 h-3.5" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-8.683-2.031-9.667-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="text-center py-4 border border-dashed border-slate-200 rounded-xl">
                                            <span class="text-xs text-slate-400">Belum ada data RT</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-3xl p-12 text-center shadow-lg border border-slate-100">
                        <div class="text-6xl mb-6">🗺️</div>
                        <h3 class="text-2xl font-bold text-slate-700">Belum Ada Data</h3>
                        <p class="text-slate-500 mt-2">Data wilayah belum ditambahkan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection
