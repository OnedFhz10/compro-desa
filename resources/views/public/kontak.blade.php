@extends('layouts.app')
@section('title', 'Hubungi Kami')
@section('content')

    {{-- HERO SECTION --}}
    <div class="bg-slate-900 py-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Hubungi Kami</h1>
            <p class="text-slate-300 text-lg">Kami siap melayani dan mendengar aspirasi Anda.</p>
        </div>
    </div>

    <div class="bg-gray-50 py-16 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            {{-- INFO CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 -mt-24 relative z-20">

                {{-- Card 1: Alamat --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mb-6">
                        📍
                    </div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Alamat Kantor</h3>
                    <p class="text-slate-500 leading-relaxed">
                        {{ $profile->address ?? 'Alamat Desa Belum Diisi' }}
                    </p>
                </div>

                {{-- Card 2: Kontak --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mb-6">
                        📞
                    </div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Kontak Resmi</h3>
                    <div class="space-y-2">
                        <p class="text-slate-500">
                            <span class="font-bold block text-slate-700">Telepon / WhatsApp:</span>
                            {{ $profile->phone ?? '-' }}
                        </p>
                        <p class="text-slate-500">
                            <span class="font-bold block text-slate-700">Email:</span>
                            {{ $profile->email ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Card 3: Jam Operasional --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-3xl mb-6">
                        ⏰
                    </div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Jam Pelayanan</h3>
                    <div class="space-y-1 text-slate-500">
                        <p><span class="font-bold text-slate-700">Senin - Kamis:</span> 08.00 - 14.00</p>
                        <p><span class="font-bold text-slate-700">Jumat:</span> 08.00 - 11.00</p>
                        <p><span class="font-bold text-slate-700">Sabtu - Minggu:</span> Libur</p>
                    </div>
                </div>

            </div>

            {{-- GOOGLE MAPS & TEXT --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Map --}}
                <div class="bg-white p-2 rounded-3xl shadow-lg border border-gray-200">
                    <div class="rounded-2xl overflow-hidden h-96 relative">
                        {{-- Ganti src iframe di bawah ini dengan Embed Map asli desa Anda --}}
                        <iframe
                            src="https://maps.google.com/maps?q={{ urlencode(($profile->village_name ?? 'Desa') . ' Tasikmalaya') }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

                {{-- Text Content --}}
                <div>
                    <span class="text-blue-600 font-bold tracking-widest text-sm uppercase mb-2 block">Lokasi Kami</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-800 mb-6">Berkunjung ke Desa
                        {{ $profile->village_name ?? 'Kami' }}</h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">
                        Kantor Desa kami terletak strategis di pusat pemukiman warga. Kami menyambut baik kedatangan Anda
                        untuk keperluan administrasi, pelayanan publik, maupun kunjungan dinas.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://maps.google.com/?q={{ $profile->village_name ?? 'Desa' }}" target="_blank"
                            class="bg-slate-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg">
                            Buka di Google Maps
                        </a>
                        <a href="https://wa.me/{{ $profile->phone ?? '' }}" target="_blank"
                            class="bg-green-100 text-green-700 px-6 py-3 rounded-xl font-bold hover:bg-green-200 transition">
                            Chat WhatsApp
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
