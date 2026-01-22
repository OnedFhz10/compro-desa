@extends('layouts.app')
@section('title', 'Layanan Surat Online')
@section('content')

    <div class="bg-slate-900 py-20 text-center relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-4xl font-extrabold text-white mb-2">Layanan Surat Online</h1>
            <p class="text-slate-300">Ajukan surat administrasi kependudukan dari rumah.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
            <form action="{{ route('public.layanan.surat.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-bold text-slate-700 mb-2">NIK</label>
                        <input type="number" name="nik"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required placeholder="16 Digit NIK">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required placeholder="Sesuai KTP">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block font-bold text-slate-700 mb-2">Nomor WhatsApp</label>
                    <input type="text" name="phone"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required placeholder="08xxxxxxxxxx">
                    <p class="text-xs text-slate-500 mt-1">*Notifikasi status akan dikirim jika tersedia.</p>
                </div>

                <div class="mb-6">
                    <label class="block font-bold text-slate-700 mb-2">Jenis Surat</label>
                    <select name="letter_type"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha (SKU)</option>
                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu (SKTM)</option>
                        <option value="Surat Pengantar KTP/KK">Surat Pengantar KTP / KK</option>
                        <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                        <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block font-bold text-slate-700 mb-2">Keperluan (Opsional)</label>
                    <textarea name="keperluan" rows="3"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Untuk persyaratan daftar sekolah"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Ajukan Permohonan Surat
                </button>
            </form>
        </div>
    </div>
@endsection
