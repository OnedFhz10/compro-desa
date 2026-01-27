@extends('layouts.admin')

@section('title', 'Kelola Profil Desa')

@section('content')

    <div class="space-y-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-100">Identitas & Profil</h2>
                <p class="text-gray-400 text-sm">Kelola data sejarah, visi misi, struktur organisasi, dan identitas utama
                    desa.</p>
            </div>
            <button type="submit" form="profile-form"
                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg transition flex items-center gap-2 transform hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                    </path>
                </svg>
                Simpan Perubahan
            </button>
        </div>

        @if (session('success'))
            <div class="bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form id="profile-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- KOLOM KIRI --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- 1. LOGO --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Logo Desa</h3>
                        <div class="flex flex-col items-center text-center gap-4">
                            @if ($profile->logo_path)
                                <div class="bg-white p-2 rounded-full border-4 border-gray-600 shadow-md">
                                    <img src="{{ asset('storage/' . $profile->logo_path) }}"
                                        class="h-24 w-24 object-contain">
                                </div>
                            @else
                                <div
                                    class="h-24 w-24 bg-gray-700 rounded-full flex items-center justify-center text-xs text-gray-400 border-2 border-dashed border-gray-600">
                                    No Logo</div>
                            @endif
                            <div class="w-full">
                                <input type="file" name="logo_path"
                                    class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-blue-900 file:text-blue-300 border border-gray-600 rounded-lg bg-gray-900">
                            </div>
                        </div>
                    </div>

                    {{-- 2. STRUKTUR ORGANISASI --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Struktur
                            Organisasi</h3>

                        <div class="space-y-4">
                            {{-- Preview Gambar (Gunakan structure_image_path) --}}
                            @if ($profile->structure_image_path)
                                <div class="relative group rounded-lg overflow-hidden border border-gray-600">
                                    <img src="{{ asset('storage/' . $profile->structure_image_path) }}"
                                        class="w-full h-auto object-cover opacity-80 group-hover:opacity-100 transition duration-300">
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300">
                                        <a href="{{ asset('storage/' . $profile->structure_image_path) }}" target="_blank"
                                            class="text-xs bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-500">Lihat
                                            Full</a>
                                    </div>
                                </div>
                                <p class="text-center text-xs text-green-400 font-medium mt-1">Gambar Terupload</p>
                            @else
                                <div
                                    class="w-full h-32 bg-gray-700 rounded-lg border-2 border-dashed border-gray-600 flex flex-col items-center justify-center text-gray-500">
                                    <span class="text-xs">Belum ada gambar struktur</span>
                                </div>
                            @endif

                            {{-- Input Upload (PENTING: name="structure_image_path") --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Upload Bagan Struktur</label>
                                <input type="file" name="structure_image_path"
                                    class="block w-full text-sm text-gray-400
                                file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                                file:text-xs file:font-semibold file:bg-purple-900 file:text-purple-300
                                hover:file:bg-purple-800 cursor-pointer border border-gray-600 rounded-lg bg-gray-900">
                                <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG. Max 5MB.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 3. KONTAK --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Kontak</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-gray-400 text-sm">Nama Desa</label>
                                <input type="text" name="village_name"
                                    value="{{ old('village_name', $profile->village_name) }}"
                                    class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm">Email</label>
                                <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                                    class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                                    class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm">Alamat</label>
                                <textarea name="address" rows="3" class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-3 py-2">{{ old('address', $profile->address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Sejarah</h3>
                        <textarea name="history" rows="12" class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-4 py-3">{{ old('history', $profile->history) }}</textarea>
                    </div>

                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Visi & Misi</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-gray-400 text-sm">Visi</label>
                                <textarea name="vision" rows="3" class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-4 py-3">{{ old('vision', $profile->vision) }}</textarea>
                            </div>
                            <div>
                                <label class="text-gray-400 text-sm">Misi</label>
                                <textarea name="mission" rows="6" class="w-full bg-gray-900 border-gray-600 text-gray-100 rounded-lg px-4 py-3">{{ old('mission', $profile->mission) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
