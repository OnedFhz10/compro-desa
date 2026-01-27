<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Desa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        {{-- Mobile Overlay --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

        {{-- SIDEBAR --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 border-r border-gray-700 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 flex flex-col shadow-xl">

            {{-- Logo --}}
            <div class="flex items-center justify-center h-14 bg-gray-900 border-b border-gray-700">
                <span class="text-lg font-bold uppercase text-blue-500 tracking-wider">Admin Desa</span>
            </div>

            {{-- Navigasi --}}
            <nav class="flex-1 overflow-y-auto py-4 space-y-1 px-3">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                {{-- Group: Profil --}}
                <div class="px-4 mt-6 mb-1 text-xs font-bold text-gray-500 uppercase">Profil</div>
                <a href="{{ route('admin.profile.edit') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.profile.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Identitas Desa</span>
                </a>

                {{-- Group: Pemerintahan --}}
                <div class="px-4 mt-6 mb-1 text-xs font-bold text-gray-500 uppercase">Pemerintahan</div>
                <a href="{{ route('admin.officials.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.officials.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Perangkat Desa</span>
                </a>
                <a href="{{ route('admin.institutions.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.institutions.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                    </svg>
                    <span class="text-sm font-medium">Lembaga Desa</span>
                </a>
                {{-- MENU RT/RW --}}
                <a href="{{ route('admin.neighborhoods.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.neighborhoods.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Data RT / RW</span>
                </a>

                {{-- Group: Informasi --}}
                <div class="px-4 mt-6 mb-1 text-xs font-bold text-gray-500 uppercase">Informasi</div>
                <a href="{{ route('admin.posts.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.posts.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Berita & Artikel</span>
                </a>
                <a href="{{ route('admin.galleries.index') }}"
                    class="flex items-center px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.galleries.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium">Galeri Foto</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-gray-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center py-2 px-4 bg-red-600/10 text-red-500 hover:bg-red-600 hover:text-white rounded-lg transition text-sm font-medium border border-red-600/20">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden bg-gray-900 relative">
            <header class="bg-gray-800 border-b border-gray-700 h-14 flex items-center justify-between px-4">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-400 hover:text-white lg:hidden"><svg
                        class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg></button>
                <div class="text-gray-200 font-semibold">@yield('title')</div>
                <div class="flex items-center space-x-3">
                    <div class="text-right hidden sm:block">
                        <div class="text-xs font-bold text-gray-200">{{ Auth::user()->name ?? 'Admin' }}</div>
                        <div class="text-[10px] text-blue-400 font-semibold uppercase">Administrator</div>
                    </div>
                    <div
                        class="h-8 w-8 rounded-full bg-gray-700 border border-gray-600 flex items-center justify-center text-blue-400 font-bold text-xs">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 lg:p-6">
                @if (session('success'))
                    <div
                        class="mb-4 p-3 bg-green-900/30 border-l-4 border-green-500 text-green-300 rounded text-sm flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
