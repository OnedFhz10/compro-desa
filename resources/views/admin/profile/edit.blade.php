@extends('layouts.admin')

@section('title', 'Kelola Profil Desa')

@section('content')

    <div class="space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-100">Identitas & Profil</h2>
                <p class="text-gray-400 text-sm">Kelola data sejarah, visi misi, dan identitas utama desa.</p>
            </div>
            <button type="submit" form="profile-form"
                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg shadow-blue-600/20 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                    </path>
                </svg>
                Simpan Perubahan
            </button>
        </div>

        <form id="profile-form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- KOLOM KIRI: LOGO & KONTAK --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- Card Logo --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Logo Desa</h3>

                        <div class="flex flex-col items-center text-center gap-4">
                            {{-- Preview Logo --}}
                            @if ($profile->logo_path)
                                <div class="bg-white p-2 rounded-full border-4 border-gray-600 shadow-md">
                                    <img src="{{ asset('storage/' . $profile->logo_path) }}"
                                        class="h-24 w-24 object-contain" alt="Logo Desa">
                                </div>
                                <span class="text-xs text-green-400">Logo saat ini aktif</span>
                            @else
                                <div
                                    class="h-24 w-24 bg-gray-700 rounded-full flex items-center justify-center text-xs text-gray-500 border-2 border-dashed border-gray-600">
                                    No Logo</div>
                            @endif

                            <div class="w-full">
                                {{-- Ubah name="logo" menjadi name="logo_path" --}}
                                <input type="file" name="logo_path"
                                    class="block w-full text-sm text-gray-400
                                file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                                file:text-xs file:font-semibold file:bg-blue-600 file:text-white
                                hover:file:bg-blue-700 cursor-pointer border border-gray-600 rounded-lg bg-gray-900">
                                <p class="text-xs text-gray-500 mt-2 text-left">Format: PNG/JPG (Transparan
                                    direkomendasikan). Max 2MB.</p>

                                @error('logo_path')
                                    <p class="text-red-500 text-xs mt-1 text-left">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Card Kontak --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Kontak & Alamat
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">Nama Desa</label>
                                <input type="text" name="village_name"
                                    value="{{ old('village_name', $profile->village_name) }}"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-600 outline-none">
                                @error('village_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">Email Resmi</label>
                                <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-600 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">Telepon / WhatsApp</label>
                                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-600 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">Alamat Lengkap</label>
                                <textarea name="address" rows="3"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-600 outline-none">{{ old('address', $profile->address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: SEJARAH & VISI MISI --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Sejarah (History) --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Sejarah Desa</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Cerita Sejarah / Profil
                                Singkat</label>
                            {{-- Ubah name="description" menjadi name="history" --}}
                            <textarea name="history" rows="10"
                                class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-600 outline-none leading-relaxed"
                                placeholder="Tuliskan sejarah berdirinya desa di sini...">{{ old('history', $profile->history) }}</textarea>
                            <p class="text-xs text-gray-500 mt-2">Teks ini akan muncul di halaman Profil Desa bagian
                                Sejarah.</p>
                        </div>
                    </div>

                    {{-- Visi Misi --}}
                    <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4 border-b border-gray-700 pb-2">Visi & Misi</h3>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Visi</label>
                                <textarea name="vision" rows="3"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-600 outline-none"
                                    placeholder="Visi desa...">{{ old('vision', $profile->vision) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Misi</label>
                                <textarea name="mission" rows="5"
                                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-600 outline-none"
                                    placeholder="Gunakan baris baru (Enter) untuk setiap poin misi.">{{ old('mission', $profile->mission) }}</textarea>
                                <p class="text-xs text-gray-500 mt-2">Tips: Pisahkan setiap poin misi dengan Enter agar
                                    muncul rapi di website.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
