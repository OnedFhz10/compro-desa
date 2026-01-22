<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-nav {
            background-color: #1e40af;
            border-right: 4px solid #60a5fa;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <aside class="w-64 bg-blue-800 text-white flex flex-col">
            <div class="p-6 text-center text-2xl font-bold border-b border-blue-700">
                Desa Admin
            </div>
            <nav class="flex-1 py-4 text-sm font-medium">

                <a href="{{ route('admin.dashboard') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.dashboard') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">📊</span> Dashboard
                </a>

                {{-- KELOMPOK PEMERINTAHAN (Agar sama dengan Public) --}}
                <div class="px-6 pt-4 pb-2 text-xs uppercase text-blue-300 font-bold">
                    Pemerintahan
                </div>

                {{-- 1. Identitas & Struktur (Digabung disini) --}}
                <a href="{{ route('admin.profile.edit') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.profile.edit') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">🏛️</span> Identitas & Struktur
                </a>

                {{-- 2. Perangkat Desa --}}
                <a href="{{ route('admin.officials.index') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.officials.*') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">👔</span> Perangkat Desa
                </a>

                {{-- 3. Lembaga Desa (YANG TADI HILANG) --}}
                <a href="{{ route('admin.institutions.index') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.institutions.*') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">🏢</span> Lembaga Desa
                </a>

                {{-- KELOMPOK KONTEN --}}
                <div class="px-6 pt-4 pb-2 text-xs uppercase text-blue-300 font-bold">
                    Konten Website
                </div>

                <a href="{{ route('admin.posts.index') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.posts.*') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">📰</span> Berita Desa
                </a>

                <a href="{{ route('admin.potentials.index') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.potentials.*') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">💎</span> Potensi Desa
                </a>

                <a href="{{ route('admin.galleries.index') }}"
                    class="block py-3 px-6 hover:bg-blue-700 transition flex items-center {{ request()->routeIs('admin.galleries.*') ? 'bg-blue-900 border-r-4 border-yellow-400' : '' }}">
                    <span class="mr-3">📷</span> Galeri Foto
                </a>

            </nav>
            <div class="p-4 border-t border-blue-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-2 px-4 text-red-200 hover:text-white hover:bg-red-600 rounded transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
                <div class="text-gray-600">Halo, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
