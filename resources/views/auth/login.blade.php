<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-gray-900 relative h-screen w-full overflow-hidden flex items-center justify-center">

    <!-- Background Gradient -->
    <div class="absolute inset-0 z-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150"></div>
    </div>

    <!-- Login Container -->
    <div class="glass relative z-10 p-8 md:p-10 rounded-2xl shadow-2xl w-full max-w-sm mx-4 transform transition-all hover:scale-[1.01]">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-600 mb-4 shadow-sm">
                @if(isset($profil) && $profil->logo_path)
                    <img src="{{ asset('storage/' . $profil->logo_path) }}" alt="Logo" class="w-10 h-10 object-contain">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                @endif
            </div>
            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">{{ $profil->village_name ?? 'Desa Digital' }}</h2>
            <p class="text-gray-500 text-sm mt-2">Masuk untuk mengelola data data</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r mb-6 text-sm shadow-sm" role="alert">
                <p class="font-bold mb-1">Terjadi Kesalahan</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 placeholder-gray-400 text-gray-900 bg-gray-50 bg-opacity-50"
                        placeholder="admin@desa.id" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 placeholder-gray-400 text-gray-900 bg-gray-50 bg-opacity-50"
                        placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center bg-gradient-to-r from-green-600 to-teal-600 text-white font-bold py-3 px-4 rounded-lg hover:from-green-700 hover:to-teal-700 focus:ring-4 focus:ring-green-300 transition duration-300 shadow-md transform hover:-translate-y-0.5">
                Masuk Dashboard
            </button>
        </form>
        
        <div class="mt-8 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} Sistem Informasi {{ $profil->village_name ?? 'Desa Digital' }}
        </div>
    </div>

</body>

</html>
