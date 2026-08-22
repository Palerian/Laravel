<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e162b">
    <title>@yield('title', 'SMK Miyamasuzaka — Sistem Informasi Akademik')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 antialiased selection:bg-purple-700 selection:text-white" x-data="{ sidebarOpen: false }">

    <div 
        id="sidebar-overlay" 
        @click="sidebarOpen = false" 
        x-show="sidebarOpen" 
        x-cloak 
        x-transition.opacity
        class="fixed inset-0 bg-slate-900/40 z-30 lg:hidden"
    ></div>

    <aside 
        id="main-sidebar" 
        class="fixed top-0 bottom-0 left-0 w-64 h-full bg-white border-r border-slate-200 z-40 flex flex-col justify-between transition-transform duration-200 ease-in-out -translate-x-full lg:translate-x-0 shadow-sm"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        <div class="flex flex-col h-full overflow-hidden">
            <div class="h-16 flex items-center justify-between px-5 border-b border-slate-200 bg-white shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-purple-700 text-white flex items-center justify-center font-bold text-base rounded shadow-sm">
                        宮
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold tracking-tight text-slate-900 leading-tight">SMK Miyamasuzaka</span>
                        <span class="text-[11px] font-semibold text-purple-700">SIA Administrator</span>
                    </div>
                </a>
                <button type="button" @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-700 p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="px-5 py-2.5 bg-slate-50 border-b border-slate-200 flex items-center justify-between text-xs text-slate-600 shrink-0">
                <span class="font-medium">T.A. 2026/2027</span>
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    Semester 1
                </span>
            </div>

            <nav class="p-3 space-y-1 overflow-y-auto flex-1 text-xs">
                <div class="px-3 pt-2 pb-1 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Utama</div>

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded text-xs font-semibold {{ request()->routeIs('dashboard') ? 'text-white bg-purple-700 shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard Utama</span>
                </a>

                <div class="px-3 pt-4 pb-1 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Data Akademik</div>

                @if(Auth::user()?->isAdministratorLevel())
                    <a href="{{ route('admin.guru.index') }}" class="flex items-center justify-between px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.guru.*') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.guru.*') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>Data Tenaga Guru</span>
                        </div>
                        <span class="text-[10px] {{ request()->routeIs('admin.guru.*') ? 'bg-purple-800 text-white' : 'bg-slate-100 text-slate-600' }} px-1.5 py-0.5 rounded font-semibold">45</span>
                    </a>
                @endif

                <a href="{{ route('admin.siswa.index') }}" class="flex items-center justify-between px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.siswa.*') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.siswa.*') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Data Siswi (600 Murid)</span>
                    </div>
                    <span class="text-[10px] {{ request()->routeIs('admin.siswa.*') ? 'bg-purple-800 text-white' : 'bg-purple-50 text-purple-700 border border-purple-200' }} px-1.5 py-0.5 rounded font-bold">600</span>
                </a>

                @if(Auth::user()?->isAdministratorLevel())
                    <a href="{{ route('admin.mapel.index') }}" class="flex items-center justify-between px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.mapel.*') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.mapel.*') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <span>Mata Pelajaran</span>
                        </div>
                        <span class="text-[10px] {{ request()->routeIs('admin.mapel.*') ? 'bg-purple-800 text-white' : 'bg-slate-100 text-slate-600' }} px-1.5 py-0.5 rounded font-semibold">28</span>
                    </a>

                    <a href="{{ route('admin.jadwal.index') }}" class="flex items-center gap-3 px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.jadwal.*') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.jadwal.*') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Jadwal Pelajaran</span>
                    </a>

                    <a href="{{ route('admin.nilai.index') }}" class="flex items-center gap-3 px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.nilai.index') || request()->routeIs('admin.nilai.create') || request()->routeIs('admin.nilai.edit') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.nilai.index') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span>Rekap & Input Nilai</span>
                    </a>

                    <a href="{{ route('admin.nilai.analisis') }}" class="flex items-center justify-between px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('admin.nilai.analisis') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.nilai.analisis') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Analisis & Ranking Rapor</span>
                        </div>
                        <span class="text-[10px] {{ request()->routeIs('admin.nilai.analisis') ? 'bg-purple-800 text-white' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }} px-1.5 py-0.5 rounded font-semibold">Rapor</span>
                    </a>
                @endif

                <div class="px-3 pt-4 pb-1 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Akun Pengguna</div>

                <a href="{{ route('profile.show', Auth::id() ?? 1) }}" class="flex items-center gap-3 px-3 py-2 rounded text-xs font-medium {{ request()->routeIs('profile.*') ? 'text-white bg-purple-700 font-semibold shadow-sm' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('profile.*') ? 'text-white' : 'text-slate-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Profil Akun Saya</span>
                </a>

                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2 rounded text-xs font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Lihat Web Sekolah</span>
                </a>
            </nav>

            <div class="p-3 border-t border-slate-200 bg-slate-50 shrink-0 space-y-2">
                <div class="flex items-center justify-between text-[11px] text-slate-500">
                    <span>Miyamasuzaka Portal</span>
                    <span class="inline-flex items-center gap-1 font-semibold text-emerald-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Online
                    </span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-1.5 px-3 text-xs font-semibold text-slate-600 bg-white border border-slate-300 hover:bg-slate-100 hover:text-slate-900 rounded transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="lg:pl-64 flex flex-col min-h-screen">
        <header class="sticky top-0 z-30 h-16 bg-white border-b border-slate-200 px-4 sm:px-6 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <button type="button" @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-600 hover:text-slate-900 border border-slate-200 rounded">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="flex items-center gap-2 text-xs sm:text-sm">
                    <span class="font-semibold text-slate-500">SMK Miyamasuzaka</span>
                    <span class="text-slate-300">/</span>
                    <span class="font-bold text-slate-900">@yield('heading', 'Dashboard')</span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('profile.show', Auth::id() ?? 1) }}" class="flex items-center gap-2.5 p-1 rounded hover:bg-slate-50 transition-colors">
                    <x-avatar :user="Auth::user()" size="sm" />
                    <div class="hidden sm:flex flex-col text-left">
                        <span class="text-xs font-bold text-slate-800 leading-tight">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="text-[10px] font-semibold text-purple-700">{{ Auth::user()?->roleLabel() ?? 'Admin' }}</span>
                    </div>
                </a>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-6 lg:p-8 space-y-5">
            <x-alert />
            @yield('content')
        </main>

        <footer class="mt-auto bg-white border-t border-slate-200 px-6 py-4 text-xs text-slate-500 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <strong class="text-slate-700">SMK Miyamasuzaka — Sistem Informasi Akademik</strong> &copy; 2026.
            </div>
            <div class="flex items-center gap-2 text-[11px]">
                <span class="text-slate-500">Miyamasuzaka Girls Academy</span>
            </div>
        </footer>
    </div>

</body>
</html>
