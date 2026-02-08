@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-blue-400 hover:text-blue-300 flex items-center mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Manajemen User
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Indentitas User</h1>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-lg border border-gray-700 p-6 max-w-2xl">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full bg-gray-700 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="Contoh: Budi Santoso">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full bg-gray-700 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror"
                    placeholder="nama@desa.id">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Role --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2">Role / Jabatan</label>
                <select name="role_id" class="w-full bg-gray-700 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-6 border-t border-gray-700 pt-4">
                <h3 class="text-lg font-semibold text-white mb-2">Ganti Password (Opsional)</h3>
                <p class="text-gray-400 text-sm mb-4">Biarkan kosong jika tidak ingin mengganti password.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Password --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-bold mb-2">Password Baru</label>
                        <input type="password" name="password"
                            class="w-full bg-gray-700 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    {{-- Confirm Password --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-bold mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full bg-gray-700 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
