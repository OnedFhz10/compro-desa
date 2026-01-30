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
            class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden" x-cloak></div>

        {{-- SIDEBAR (Diambil dari file terpisah) --}}
        @include('layouts.partials.sidebar')

        {{-- Main Content Wrapper --}}
        <div class="flex-1 flex flex-col overflow-hidden bg-gray-900 relative">

            {{-- Header --}}
            <header class="bg-gray-800 border-b border-gray-700 h-14 flex items-center justify-between px-4">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-400 hover:text-white lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
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

            {{-- Isi Konten --}}
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
