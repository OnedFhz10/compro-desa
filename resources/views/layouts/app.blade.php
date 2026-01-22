<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ \App\Models\VillageProfile::first()->village_name ?? 'Website Desa' }}</title>

    {{-- CDN Tailwind CSS (Pastikan konek internet) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts: Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Custom Style untuk Font --}}
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body
    class="bg-gray-50 flex flex-col min-h-screen text-slate-800 antialiased selection:bg-blue-600 selection:text-white">

    @include('layouts.navbar')

    {{-- Padding top agar konten tidak ketutup navbar fixed --}}
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>

</html>
