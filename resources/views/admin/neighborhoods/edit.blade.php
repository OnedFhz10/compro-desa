@extends('layouts.admin')

@section('title', 'Edit Data RT')

@section('content')
    <div class="max-w-xl mx-auto bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-6">

        <div class="mb-6 border-b border-gray-700 pb-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-100">Edit Data RT</h3>
            <a href="{{ route('admin.neighborhoods.index') }}"
                class="text-gray-400 hover:text-white text-sm transition">&larr; Batal</a>
        </div>

        <form action="{{ route('admin.neighborhoods.update', $neighborhood->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- 1. DUSUN --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Nama Dusun</label>
                <input type="text" name="dusun" value="{{ old('dusun', $neighborhood->dusun) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-blue-600 focus:border-blue-600"
                    required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- 2. RW --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-1">Nomor RW</label>
                    <input type="text" name="rw" value="{{ old('rw', $neighborhood->rw) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-blue-600 focus:border-blue-600"
                        required>
                </div>

                {{-- 3. RT --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-1">Nomor RT</label>
                    <input type="text" name="rt" value="{{ old('rt', $neighborhood->rt) }}"
                        class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-blue-600 focus:border-blue-600"
                        required>
                </div>
            </div>

            {{-- 4. KETUA RT (head_name) --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Nama Ketua RT</label>
                <input type="text" name="head_name" value="{{ old('head_name', $neighborhood->head_name) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-blue-600 focus:border-blue-600"
                    required>
            </div>

            {{-- 5. TELEPON --}}
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Nomor HP</label>
                <input type="text" name="phone" value="{{ old('phone', $neighborhood->phone) }}"
                    class="w-full bg-gray-900 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-blue-600 focus:border-blue-600">
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 shadow-lg transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
