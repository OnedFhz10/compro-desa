@extends('layouts.admin')

@section('title', 'Identitas Desa')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        {{-- Header --}}
        <div class="border-b border-gray-700 pb-4 mb-6">
            <h2 class="text-xl font-bold text-white">Edit Profil Desa</h2>
            <p class="text-sm text-gray-400">Kelola informasi lengkap profil desa, kontak, dan metadata.</p>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tab Navigation --}}
            <div class="mb-6 border-b border-gray-700">
                <nav class="flex space-x-4" role="tablist">
                    <button type="button" class="tab-btn active px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="basic">
                        📋 Informasi Dasar
                    </button>
                    <button type="button" class="tab-btn px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="identity">
                        🏛️ Identitas Desa
                    </button>

                    <button type="button" class="tab-btn px-4 py-2 text-sm font-medium rounded-t-lg" data-tab="media">
                        🖼️ Media
                    </button>
                </nav>
            </div>

            {{-- Tab Contents --}}
            <div class="tab-content-container">

                {{-- TAB 1: INFORMASI DASAR --}}
                <div class="tab-content active" id="basic">
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Informasi Kontak & Alamat</h3>

                        {{-- Nama Desa --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Nama Desa *</label>
                            <input type="text" name="village_name" value="{{ old('village_name', $profile->village_name ?? '') }}" required
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Contoh: Desa Sukamaju">
                            @error('village_name')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Alamat Lengkap --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-300">Alamat Kantor Desa</label>
                                <textarea name="address" rows="2"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Jl. Raya Desa No. 1">{{ old('address', $profile->address ?? '') }}</textarea>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Kecamatan</label>
                                <input type="text" name="district" value="{{ old('district', $profile->district ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Kabupaten</label>
                                <input type="text" name="regency" value="{{ old('regency', $profile->regency ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Provinsi</label>
                                <input type="text" name="province" value="{{ old('province', $profile->province ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Kode Pos</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>

                        {{-- Kontak --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Email Resmi</label>
                                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="desa@example.com">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-300">Nomor Telepon / WhatsApp</label>
                                <input type="tel" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="08xxxx atau (0xxx) xxxxx">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 2: IDENTITAS DESA --}}
                <div class="tab-content hidden" id="identity">
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Sejarah, Visi & Misi</h3>

                        {{-- Sejarah --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Sejarah Desa</label>
                            <textarea name="history" rows="6"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Ceritakan sejarah desa Anda...">{{ old('history', $profile->history ?? '') }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Gunakan paragraf untuk menjelaskan sejarah desa</p>
                        </div>

                        {{-- Visi --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Visi</label>
                            <textarea name="vision" rows="3"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Tuliskan visi desa...">{{ old('vision', $profile->vision ?? '') }}</textarea>
                        </div>

                        {{-- Misi --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-300">Misi</label>
                            <textarea name="mission" rows="6"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Tuliskan setiap poin misi di baris baru...">{{ old('mission', $profile->mission ?? '') }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">💡 Tip: Pisahkan setiap poin misi dengan baris baru (Enter)</p>
                        </div>
                    </div>
                </div>



                {{-- TAB 4: MEDIA --}}
                <div class="tab-content hidden" id="media">
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Logo & Gambar</h3>

                        {{-- Logo Desa --}}
                        <div class="bg-gray-700 p-4 rounded-lg border border-gray-600">
                            <label class="block mb-3 text-sm font-medium text-gray-300">Logo Desa</label>

                            @if (isset($profile->logo_path) && $profile->logo_path)
                                <div class="mb-3 flex justify-center p-4 bg-gray-800 rounded">
                                    <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo" class="h-32 object-contain">
                                </div>
                            @else
                                <div class="mb-3 h-32 bg-gray-800 rounded flex items-center justify-center text-gray-500 text-xs">
                                    Belum ada logo
                                </div>
                            @endif

                            <input type="file" name="logo_path" accept="image/*"
                                class="block w-full text-xs text-gray-400 border border-gray-600 rounded cursor-pointer bg-gray-600 focus:outline-none">
                            <p class="mt-1 text-[10px] text-gray-400">Format: PNG/JPG/WebP (Max 2MB). Transparan disarankan untuk logo.</p>
                        </div>
                    </div>
                </div>



            </div>

            {{-- Tombol Simpan --}}
            <div class="mt-8 pt-6 border-t border-gray-700 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg">
                    💾 Simpan Semua Perubahan
                </button>
            </div>

        </form>
    </div>

    {{-- Tab Switching Script --}}
    <script>
        // Tab switching
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetTab = this.dataset.tab;

                // Remove active class from all tabs and contents
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active', 'bg-gray-700', 'text-white');
                    b.classList.add('text-gray-400');
                });
                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));

                // Add active class to clicked tab
                this.classList.add('active', 'bg-gray-700', 'text-white');
                this.classList.remove('text-gray-400');

                // Show corresponding content
                document.getElementById(targetTab).classList.remove('hidden');
            });
        });

        // Initialize first tab
        document.querySelector('.tab-btn.active').classList.add('bg-gray-700', 'text-white');
        document.querySelectorAll('.tab-btn:not(.active)').forEach(b => b.classList.add('text-gray-400'));


    </script>
@endsection
