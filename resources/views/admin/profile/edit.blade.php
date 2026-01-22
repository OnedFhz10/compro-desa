@extends('layouts.admin')

@section('title', 'Identitas Desa')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Start --}}
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Kolom Kiri: Data Teks --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Nama Desa</label>
                        <input type="text" name="village_name" value="{{ old('village_name', $profile->village_name) }}"
                            class="w-full border rounded px-3 py-2 focus:outline-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Alamat Kantor</label>
                        <textarea name="address" rows="3" class="w-full border rounded px-3 py-2 focus:outline-blue-500">{{ old('address', $profile->address) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Sejarah Desa</label>
                        <textarea name="history" rows="5" class="w-full border rounded px-3 py-2 focus:outline-blue-500">{{ old('history', $profile->history) }}</textarea>
                    </div>
                </div>

                {{-- Kolom Kanan: Visi Misi & Logo --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Visi</label>
                        <textarea name="vision" rows="3" class="w-full border rounded px-3 py-2 focus:outline-blue-500">{{ old('vision', $profile->vision) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Misi</label>
                        <textarea name="mission" rows="4" class="w-full border rounded px-3 py-2 focus:outline-blue-500">{{ old('mission', $profile->mission) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Logo Desa</label>
                        @if ($profile->logo_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="Logo Lama"
                                    class="h-20 w-auto border rounded p-1">
                            </div>
                        @endif
                        <input type="file" name="logo" class="w-full border rounded px-3 py-2">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, Maks 2MB.</p>
                    </div>

                    <div class="mt-4 border-t pt-4">
                        <label class="block text-gray-700 font-bold mb-2">Bagan Struktur Organisasi</label>
                        @if ($profile->structure_image_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $profile->structure_image_path) }}"
                                    class="w-full max-w-xs border rounded p-1">
                            </div>
                        @endif
                        <input type="file" name="structure" class="w-full border rounded px-3 py-2">
                        <p class="text-xs text-gray-500 mt-1">Upload gambar bagan struktur organisasi (JPG/PNG).</p>
                    </div>

                </div>

            </div>

            <div class="mt-6 border-t pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
