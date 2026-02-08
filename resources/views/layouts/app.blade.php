<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- GLOBAL DATA PROFIL DESA (Shared via AppServiceProvider) --}}
    @php
        // Variable $profile already sent by AppServiceProvider
        $siteName = $profile?->village_name ?? 'Desa Digital';
        // Default deskripsi jika di halaman tidak di-set
        $defaultDesc =
            'Website Resmi Pemerintah ' .
            $siteName .
            '. Pusat informasi, layanan mandiri, transparansi anggaran, dan potensi desa.';
        // Default image jika tidak ada foto berita
        $defaultImage = $profile?->logo_path
            ? asset('storage/' . $profile->logo_path)
            : 'https://via.placeholder.com/1200x630.webp?text=' . urlencode($siteName); // Use WebP placeholder
    @endphp

    {{-- 1. SEO UTAMA --}}
    <title>@yield('title') - {{ $siteName }}</title>
    <meta name="description" content="@yield('meta_description', $defaultDesc)">
    <meta name="author" content="Pemerintah {{ $siteName }}">
    <meta name="keywords"
        content="desa, website desa, {{ $siteName }}, layanan desa, profil desa, tasikmalaya, pemerintah desa">

    {{-- 2. OPEN GRAPH (Untuk Facebook/WhatsApp) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="@yield('title') - {{ $siteName }}">
    <meta property="og:description" content="@yield('meta_description', $defaultDesc)">
    <meta property="og:image" content="@yield('meta_image', $defaultImage)">

    {{-- 3. TWITTER CARDS --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') - {{ $siteName }}">
    <meta name="twitter:description" content="@yield('meta_description', $defaultDesc)">
    <meta name="twitter:image" content="@yield('meta_image', $defaultImage)">

    {{-- 4. FAVICON (Ikon di Tab Browser) --}}
    @if ($profile?->logo_path)
        <link rel="icon" href="{{ asset('storage/' . $profile->logo_path) }}" type="image/png">
    @endif

    {{-- 5. OPTIMIZATION: Removed NProgress CDN for local performance or keep minimal --}}
    {{-- Google Fonts: Plus Jakarta Sans (Reduced Weights: 400, 600, 700) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">

    {{-- Vite Resource Loading --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom Style --}}
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body
    class="bg-gray-50 flex flex-col min-h-screen text-slate-800 antialiased selection:bg-blue-600 selection:text-white">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- MAIN CONTENT --}}
    {{-- pt-20 digunakan agar konten tidak tertutup navbar yang fixed --}}
    {{-- flex-grow digunakan agar footer terdorong ke paling bawah (sticky footer) --}}
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- BACK TO TOP BUTTON --}}
    <button id="backToTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-xl hover:bg-blue-700 transition-all duration-300 opacity-0 invisible translate-y-10 z-50 group border border-blue-500">
        <svg class="w-6 h-6 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

</body>

</html>
