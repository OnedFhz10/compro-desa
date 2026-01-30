@extends('layouts.admin')

@section('title', 'Identitas Desa')

@section('content')
    {{-- 
    CATATAN PENTING:
    Tidak perlu ada kode @if (session('success')) di sini, 
    karena sudah otomatis ditangani oleh file layouts/admin.blade.php 
--}}

    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="border-b border-gray-700 pb-4 mb-6">
            <h2 class="text-xl font-bold text-white">Edit Profil Desa</h2>
            <p class="text-sm text-gray-400">Informasi umum, kontak, dan data visual desa.</p>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- KOLOM KIRI: Data Teks --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Nama Desa --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Nama Desa</label>
                        <input type="text" name="village_name"
                            value="{{ old('village_name', $profile->village_name ?? '') }}" required
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    {{-- Kontak --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Email Resmi</label>
                            <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Nomor Telepon / WhatsApp</label>
                            <input type="tel" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Alamat Kantor Desa</label>
                        <textarea name="address" rows="2"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('address', $profile->address ?? '') }}</textarea>
                    </div>

                    {{-- Sejarah --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-300">Sejarah Desa</label>
                        <textarea name="history" rows="4"
                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('history', $profile->history ?? '') }}</textarea>
                    </div>

                    {{-- Visi & Misi --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Visi</label>
                            <textarea name="vision" rows="4"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('vision', $profile->vision ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Misi</label>
                            <textarea name="mission" rows="4"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('mission', $profile->mission ?? '') }}</textarea>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN: Gambar --}}
                <div class="space-y-6">

                    {{-- Logo Desa --}}
                    <div class="bg-gray-700 p-4 rounded-lg border border-gray-600">
                        <label class="block mb-3 text-sm font-medium text-gray-300">Logo Desa</label>

                        @if (isset($profile->logo_path) && $profile->logo_path)
                            <div class="mb-3 flex justify-center p-2 bg-gray-800 rounded">
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo"
                                    class="h-32 object-contain">
                            </div>
                        @else
                            <div
                                class="mb-3 h-32 bg-gray-800 rounded flex items-center justify-center text-gray-500 text-xs">
                                Belum ada logo
                            </div>
                        @endif

                        <input type="file" name="logo_path" accept="image/*"
                            class="block w-full text-xs text-gray-400 border border-gray-600 rounded cursor-pointer bg-gray-600 focus:outline-none">
                        <p class="mt-1 text-[10px] text-gray-400">Format: PNG/JPG (Max 2MB). Transparan disarankan.</p>
                    </div>
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="mt-8 pt-6 border-t border-gray-700 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
@endsection
