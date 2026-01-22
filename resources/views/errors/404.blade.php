@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center bg-slate-50 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>

        <div class="text-center relative z-10 px-4">
            <h1 class="text-9xl font-extrabold text-slate-200">404</h1>

            <div class="-mt-12">
                <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                    Oops! Salah Jalan?
                </span>
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Halaman Tidak Ditemukan</h2>
                <p class="text-slate-500 max-w-md mx-auto mb-8">
                    Maaf, halaman yang Anda cari mungkin telah dihapus, dipindahkan, atau link yang Anda tuju salah.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}"
                        class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('public.contact') }}"
                        class="bg-white border border-slate-200 text-slate-700 px-8 py-3 rounded-full font-bold hover:bg-slate-50 transition">
                        Lapor Masalah
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
