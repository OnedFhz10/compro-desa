@extends('layouts.app')
@section('title', 'Pengaduan & Aspirasi')
@section('content')

    <div class="bg-slate-900 py-20 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-2">Pengaduan & Aspirasi</h1>
        <p class="text-slate-300">Sampaikan kritik, saran, atau laporan masalah di lingkungan desa.</p>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Kiri: Info --}}
            <div>
                <span class="text-orange-500 font-bold tracking-widest text-sm uppercase mb-2 block">Suara Warga</span>
                <h2 class="text-3xl font-extrabold text-slate-800 mb-6">Kami Mendengar Anda</h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    Partisipasi aktif masyarakat sangat penting untuk kemajuan desa. Jangan ragu untuk melaporkan
                    infrastruktur rusak, pelayanan yang kurang memuaskan, atau ide-ide kreatif untuk pembangunan desa.
                </p>
                <div class="bg-orange-50 p-6 rounded-2xl border border-orange-100">
                    <h4 class="font-bold text-orange-800 mb-2">🔐 Privasi Terjaga</h4>
                    <p class="text-sm text-orange-700">Anda dapat mengirimkan laporan secara anonim (tanpa nama) jika
                        menginginkan privasi lebih.</p>
                </div>
            </div>

            {{-- Kanan: Form --}}
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                <form action="{{ route('public.layanan.pengaduan.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block font-bold text-slate-700 mb-2">Nama (Opsional)</label>
                            <input type="text" name="name"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Boleh dikosongkan">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-2">No. HP (Opsional)</label>
                            <input type="text" name="phone"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold text-slate-700 mb-2">Kategori Laporan</label>
                        <select name="category"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
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
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
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
