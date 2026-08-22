<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e162b">
    <title>@yield('title', 'Portal Siswi — SMK Miyamasuzaka')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen flex flex-col text-slate-800 antialiased selection:bg-purple-700 selection:text-white">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-40 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="h-16 flex items-center justify-between">
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                        <div class="w-8 h-8 bg-purple-700 text-white flex items-center justify-center font-bold text-base rounded shadow-sm">
                            宮
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">SMK MIYAMASUZAKA</span>
                            <span class="text-[10px] text-purple-700 font-semibold">Portal Siswi</span>
                        </div>
                    </a>
                </div>

                <div class="flex items-center gap-3 text-xs">
                    <a href="{{ route('murid.dashboard') }}" class="px-3 py-1.5 rounded font-semibold transition-colors {{ request()->routeIs('murid.dashboard') ? 'bg-purple-50 text-purple-700 font-bold border border-purple-200' : 'text-slate-600 hover:text-slate-900' }}">
                        Dashboard Siswi
                    </a>

                    <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center gap-2 p-1 rounded hover:bg-slate-100 transition-colors">
                        <x-avatar :user="Auth::user()" size="sm" />
                        <span class="hidden sm:inline font-bold text-slate-800">{{ Auth::user()->name }}</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-2.5 py-1 text-slate-500 hover:text-rose-600 font-medium">
                            Keluar
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto p-4 sm:p-6 lg:p-8 space-y-6">
        <x-alert />
        @yield('content')
    </main>

    <footer class="mt-auto bg-white border-t border-slate-200 py-4 text-xs text-slate-500 text-center">
        <div class="max-w-6xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div>
                <strong>SMK Miyamasuzaka — Portal Siswi Terpadu</strong> &copy; 2026.
            </div>
            <div class="text-[11px] text-slate-400">
                Sistem Informasi Akademik Siswi • Shibuya, Tokyo
            </div>
        </div>
    </footer>

</body>
</html>
