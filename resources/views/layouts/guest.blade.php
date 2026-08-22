<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e162b">
    <title>@yield('title', 'Portal SIA — SMK Miyamasuzaka')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-center items-center p-4 sm:p-6 text-slate-800 antialiased selection:bg-purple-700 selection:text-white">

    <div class="w-full max-w-md space-y-6">
        <div class="text-center space-y-2">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                <div class="w-12 h-12 bg-purple-700 text-white flex items-center justify-center font-bold text-2xl rounded shadow-sm">
                    宮
                </div>
            </a>
            <div>
                <h1 class="text-lg font-bold text-slate-900 leading-tight">SMK Miyamasuzaka Girls Academy</h1>
                <p class="text-xs font-semibold text-purple-700">Sistem Informasi Akademik</p>
                <p class="text-[11px] text-slate-500 mt-0.5">Portal Layanan Akademik Siswi, Guru & Administrator</p>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
            {{ $slot ?? '' }}
            @yield('content')
        </div>

        <div class="text-center text-[11px] text-slate-500 space-y-1">
            <div>&copy; 2026 SMK Miyamasuzaka Girls Academy • Shibuya, Tokyo</div>
            <div>
                <a href="{{ route('home') }}" class="text-purple-700 font-semibold hover:underline">← Kembali ke Beranda Sekolah</a>
            </div>
        </div>
    </div>

</body>
</html>
