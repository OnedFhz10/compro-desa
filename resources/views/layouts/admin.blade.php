<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Desa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

        /* Custom Scrollbar untuk Admin (Dark Theme) */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        /* gray-800 */
        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }

        /* gray-600 */
        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* gray-500 */
    </style>
</head>

<body class="bg-gray-900 text-gray-100 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 border-r border-gray-700 transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col shadow-xl">

            <div class="flex items-center justify-center h-16 bg-gray-900 border-b border-gray-700">
                <div class="flex items-center gap-2 font-bold text-xl tracking-wide uppercase text-blue-500">
                    <span class="text-2xl">🔥</span> Admin Desa
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto sidebar-scroll py-4 space-y-1">

                {{-- 1. BERANDA / UTAMA --}}
                <div class="px-6 mt-2 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Utama</div>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    Dashboard
                </a>

                {{-- 2. PROFIL DESA --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Profil Desa</div>

                <a href="{{ route('admin.profile.edit') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Identitas & Sejarah
                </a>

                {{-- 3. PEMERINTAHAN --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Pemerintahan</div>

                <a href="{{ route('admin.officials.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.officials.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Perangkat Desa
                </a>

                <a href="{{ route('admin.institutions.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.institutions.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Lembaga Desa
                </a>

                {{-- 4. INFORMASI --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Informasi Publik
                </div>

                <a href="{{ route('admin.posts.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.posts.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    Berita & Artikel
                </a>

                <a href="{{ route('admin.galleries.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.galleries.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Galeri Foto
                </a>

                {{-- 5. POTENSI --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Potensi Desa</div>

                <a href="{{ route('admin.potentials.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.potentials.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Potensi & UMKM
                </a>

                {{-- 6. TRANSPARANSI --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Transparansi</div>

                <a href="{{ route('admin.budgets.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.budgets.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                        </path>
                    </svg>
                    APBDes / Anggaran
                </a>

                {{-- 7. LAYANAN PUBLIK --}}
                <div class="px-6 mt-6 mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Layanan</div>

                <a href="{{ route('admin.letters.index') }}"
                    class="flex items-center px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.letters.*') ? 'bg-gray-700 border-r-4 border-blue-500 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Permohonan Surat
                    @php
                        try {
                            $pendingCount = \App\Models\LetterRequest::where('status', 'pending')->count();
                        } catch (\Exception $e) {
                            $pendingCount = 0;
                        }
                    @endphp
                    @if ($pendingCount > 0)
                        <span
                            class="ml-auto bg-red-600 text-white py-0.5 px-2 rounded-full text-xs font-bold">{{ $pendingCount }}</span>
                    @endif
                </a>

            </nav>

            {{-- Logout Button --}}
            <div class="p-4 bg-gray-900 border-t border-gray-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center py-2 px-4 bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white rounded-lg shadow-sm transition-colors text-sm font-medium border border-red-600/20 hover:border-red-600">
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

        {{-- MAIN CONTENT WRAPPER --}}
        <div class="flex-1 flex flex-col overflow-hidden relative bg-gray-900">

            {{-- HEADER (Dark) --}}
            <header
                class="bg-gray-800 border-b border-gray-700 h-16 flex items-center justify-between px-4 lg:px-6 z-10">

                {{-- Hamburger Button --}}
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-gray-400 hover:text-white focus:outline-none lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <h2 class="text-lg font-bold text-gray-100 hidden lg:block">
                    @yield('title')
                </h2>

                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <div class="text-sm font-bold text-gray-200">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="text-xs text-blue-400 font-semibold uppercase">Super Admin</div>
                    </div>
                    <div
                        class="h-10 w-10 rounded-full bg-gray-700 border-2 border-gray-600 flex items-center justify-center text-blue-400 font-bold shadow-sm">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            {{-- MAIN SCROLLABLE CONTENT --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 lg:p-8">
                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-green-900/50 border-l-4 border-green-500 text-green-300 rounded shadow-sm flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
