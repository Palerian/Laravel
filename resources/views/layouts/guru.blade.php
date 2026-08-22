<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e162b">
    <title>@yield('title', 'Portal Guru — SMK Miyamasuzaka')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen flex text-slate-800 antialiased selection:bg-purple-700 selection:text-white" x-data="{ sidebarOpen: false }">

    <div 
        x-show="sidebarOpen" 
        x-cloak 
        @click="sidebarOpen = false" 
        class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden transition-opacity"
    ></div>

    <aside 
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 flex flex-col justify-between transition-transform duration-200 lg:static lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="flex flex-col flex-1 overflow-y-auto">
            <div class="h-16 px-5 border-b border-slate-200 flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-purple-700 text-white flex items-center justify-center font-bold text-lg rounded shadow-sm shrink-0">
                        宮
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-900 leading-tight">SMK MIYAMASUZAKA</span>
                        <span class="text-[10px] font-semibold text-purple-700">Portal Tenaga Guru</span>
                    </div>
                </a>
                <button type="button" @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="p-3 space-y-6">
                <div>
                    <span class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-2">Utama</span>
                    <div class="space-y-1 text-xs">
                        <a href="{{ route('guru.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2 rounded font-semibold transition-colors {{ request()->routeIs('guru.dashboard') ? 'bg-purple-700 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 {{ request()->routeIs('guru.dashboard') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            <span>Dashboard Guru</span>
                        </a>

                        <a href="{{ route('guru.nilai.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded font-semibold transition-colors {{ request()->routeIs('guru.nilai.*') ? 'bg-purple-700 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 {{ request()->routeIs('guru.nilai.*') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Input & Rekap Nilai</span>
                        </a>

                        <a href="{{ route('admin.siswa.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded font-semibold transition-colors {{ request()->routeIs('admin.siswa.*') ? 'bg-purple-700 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.siswa.*') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span>Direktori Siswi (600 Murid)</span>
                        </a>
                    </div>
                </div>

                <div>
                    <span class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-2">Akun</span>
                    <div class="space-y-1 text-xs">
                        <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center gap-2.5 px-3 py-2 rounded font-semibold transition-colors {{ request()->routeIs('profile.show') ? 'bg-purple-700 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 {{ request()->routeIs('profile.show') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Profil Pendidik</span>
                        </a>

                        <a href="{{ route('home') }}" class="flex items-center gap-2.5 px-3 py-2 rounded font-semibold text-slate-700 hover:bg-slate-100 transition-colors">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            <span>Lihat Web Sekolah</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 border-t border-slate-200 bg-slate-50 space-y-2">
            <div class="flex items-center gap-2.5 px-2 py-1.5">
                <x-avatar :user="Auth::user()" size="sm" />
                <div class="min-w-0">
                    <span class="text-xs font-bold text-slate-900 truncate block">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] text-purple-700 font-semibold block">Tenaga Pendidik</span>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-1.5 px-3 bg-white hover:bg-rose-50 text-rose-600 border border-slate-200 hover:border-rose-200 text-xs font-semibold rounded transition-colors text-center">
                    Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        <header class="h-16 bg-white border-b border-slate-200 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-30 shadow-sm">
            <div class="flex items-center gap-3">
                <button type="button" @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-600 hover:text-slate-900 border border-slate-200 rounded">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-sm sm:text-base font-bold text-slate-900 leading-none">@yield('heading', 'Dashboard Guru')</h1>
                    @hasSection('subheading')
                        <p class="text-[11px] text-slate-500 mt-0.5">@yield('subheading')</p>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('profile.show', Auth::id()) }}" class="flex items-center gap-2 px-2.5 py-1.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded text-xs">
                    <x-avatar :user="Auth::user()" size="sm" />
                    <span class="hidden sm:inline font-bold text-slate-800">{{ Auth::user()->name }}</span>
                </a>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-6 lg:p-8 space-y-6">
            <x-alert />
            @yield('content')
        </main>

        <footer class="mt-auto bg-white border-t border-slate-200 px-6 py-4 text-xs text-slate-500 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <strong class="text-slate-700">SMK Miyamasuzaka — Portal Guru</strong> &copy; 2026.
            </div>
            <div class="flex items-center gap-2 text-[11px]">
                <span class="text-slate-500">Miyamasuzaka Girls Academy</span>
            </div>
        </footer>
    </div>

</body>
</html>
