@extends('layouts.app')
@section('title', 'Data RT / RW')
@section('content')

    <div class="bg-slate-900 py-20 text-center relative">
        <h1 class="text-4xl font-extrabold text-white mb-4">Data Ketua RT & RW</h1>
        <p class="text-slate-300">Ujung tombak pelayanan administratif kewilayahan.</p>
    </div>

    <div class="container mx-auto px-4 py-16">
        @forelse($neighborhoods as $dusun => $rws)
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">🏡</span>
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Wilayah</span>
                        <h2 class="text-3xl font-bold text-slate-800">Dusun {{ $dusun }}</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach ($rws as $rw_no => $rts)
                        <div
                            class="bg-white rounded-3xl shadow-lg shadow-slate-200/50 border border-gray-100 overflow-hidden">
                            <div class="bg-slate-50 px-8 py-5 border-b border-gray-100 flex justify-between items-center">
                                <h3 class="font-bold text-lg text-slate-800">Rukun Warga (RW) {{ $rw_no }}</h3>
                                <span
                                    class="bg-white border border-gray-200 text-xs font-bold px-3 py-1 rounded-full text-slate-600">Total
                                    {{ count($rts) }} RT</span>
                            </div>
                            <div class="divide-y divide-gray-50">
                                @foreach ($rts as $rt)
                                    <div
                                        class="px-8 py-5 flex justify-between items-center hover:bg-blue-50/50 transition group">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs group-hover:bg-blue-600 group-hover:text-white transition">
                                                {{ $rt->rt }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800">{{ $rt->head_name }}</p>
                                                <p class="text-xs text-slate-500">Ketua RT {{ $rt->rt }}</p>
                                            </div>
                                        </div>
                                        @if ($rt->phone)
                                            <a href="https://wa.me/{{ $rt->phone }}"
                                                class="text-green-500 hover:text-green-600">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.637 3.891 1.685 5.522l-1.117 4.08 4.004-1.096z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-20">
                <p class="text-slate-500">Data RT/RW belum tersedia.</p>
            </div>
        @endforelse
    </div>
@endsection
