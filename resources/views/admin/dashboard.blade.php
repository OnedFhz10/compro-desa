@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
            <h3 class="text-gray-500 text-sm font-semibold">Total Berita</h3>
            <p class="text-3xl font-bold text-gray-800">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
            <h3 class="text-gray-500 text-sm font-semibold">Total Potensi</h3>
            <p class="text-3xl font-bold text-gray-800">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
            <h3 class="text-gray-500 text-sm font-semibold">Pengunjung Hari Ini</h3>
            <p class="text-3xl font-bold text-gray-800">0</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Selamat Datang di Panel Admin</h3>
        <p class="text-gray-600">Halo Admin! Gunakan menu di sebelah kiri untuk mengelola konten website desa.</p>
    </div>
@endsection
