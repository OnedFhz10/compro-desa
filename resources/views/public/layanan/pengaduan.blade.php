@extends('layouts.app')
@section('title', 'Pengaduan & Aspirasi')
@section('content')

    {{-- 1. HERO HEADER --}}
    <x-hero 
        title="Pengaduan & Aspirasi" 
        subtitle="Suara Warga"
        image="https://images.unsplash.com/photo-1577563908411-5077b6dc7624?q=60&w=1200&auto=format&fit=crop"
    >
        Sampaikan kritik, saran, atau laporan masalah di lingkungan desa.
    </x-hero>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Kiri: Info --}}
            <div>
                <span class="text-orange-500 font-bold tracking-widest text-sm uppercase mb-2 block animate-fade-in-up">Suara Warga</span>
                <h2 class="text-3xl font-extrabold text-slate-800 mb-6 animate-fade-in-up">Kami Mendengar Anda</h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8 animate-fade-in-up">
                    Partisipasi aktif masyarakat sangat penting untuk kemajuan desa. Jangan ragu untuk melaporkan
                    infrastruktur rusak, pelayanan yang kurang memuaskan, atau ide-ide kreatif untuk pembangunan desa.
                </p>
                <div class="bg-orange-50 p-6 rounded-2xl border border-orange-100 animate-fade-in-up">
                    <h4 class="font-bold text-orange-800 mb-2">🔐 Privasi Terjaga</h4>
                    <p class="text-sm text-orange-700">Anda dapat mengirimkan laporan secara anonim (tanpa nama) jika
                        menginginkan privasi lebih.</p>
                </div>
            </div>

            {{-- Kanan: Form --}}
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 animate-fade-in-up">
                <form action="{{ route('public.services.complaints.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block font-bold text-slate-700 mb-2">Nama (Opsional)</label>
                            <input type="text" name="name"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all placeholder:text-slate-400"
                                placeholder="Boleh dikosongkan">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-2">No. HP (Opsional)</label>
                            <input type="text" name="phone"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold text-slate-700 mb-2">Kategori Laporan</label>
                        <select name="category"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all"
                            required>
                            <option value="Infrastruktur">Infrastruktur (Jalan, Jembatan, dll)</option>
                            <option value="Pelayanan Publik">Pelayanan Publik</option>
                            <option value="Keamanan & Ketertiban">Keamanan & Ketertiban</option>
                            <option value="Sosial & Kemiskinan">Sosial & Kemiskinan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-8">
                        <label class="block font-bold text-slate-700 mb-2">Isi Laporan / Aspirasi</label>
                        <textarea name="description" rows="5"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all placeholder:text-slate-400"
                            required placeholder="Jelaskan detail laporan, lokasi, dan waktu kejadian..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-600 text-white font-bold py-4 rounded-xl hover:bg-orange-700 transition shadow-lg shadow-orange-500/30">
                        Kirim Laporan
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
