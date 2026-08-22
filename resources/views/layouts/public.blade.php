<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#1e162b">
    <meta name="description" content="SMK Miyamasuzaka Girls Academy — Sekolah Menengah Kejuruan Putri Berbasis Sains Terapan, Musik Digital DTM, Desain Visual, dan Rekayasa Teknologi.">
    <title>@yield('title', 'SMK Miyamasuzaka Girls Academy — Official Academic Portal')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen flex flex-col text-slate-800 antialiased selection:bg-purple-700 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <div class="bg-slate-900 text-slate-300 text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 text-[11px]">
            <div class="flex items-center gap-2">
                <span class="font-bold text-white">SMK Miyamasuzaka Girls Academy</span>
                <span class="text-slate-600">|</span>
                <span class="text-slate-400">Shibuya, Tokyo</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <span class="text-purple-300 font-semibold">T.A. 2026/2027 - Semester Ganjil</span>
                <a href="{{ route('public.kontak') }}" class="hover:text-white transition-colors">Akses & Kontak</a>
                <span class="text-slate-700">•</span>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-purple-300 font-bold hover:underline">Dashboard Portal SIA →</a>
                @else
                    <a href="{{ route('login') }}" class="text-purple-300 font-bold hover:underline">Masuk SIA →</a>
                @endauth
            </div>
        </div>
    </div>

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="h-20 flex items-center justify-between">
                
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 bg-purple-700 text-white flex items-center justify-center font-bold text-xl rounded shadow-sm group-hover:bg-purple-800 transition-colors shrink-0">
                        宮
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold tracking-tight text-slate-900 leading-none">SMK MIYAMASUZAKA</span>
                        <span class="text-[11px] text-purple-700 font-semibold mt-1">Miyamasuzaka Girls Academy</span>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1 text-xs font-semibold">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded transition-colors {{ request()->routeIs('home') ? 'text-purple-700 font-bold bg-purple-50 border-b-2 border-purple-700' : 'text-slate-700 hover:text-purple-700 hover:bg-slate-50' }}">
                        Beranda
                    </a>

                    <a href="{{ route('public.profil') }}" class="px-3.5 py-2 rounded transition-colors {{ request()->routeIs('public.profil') ? 'text-purple-700 font-bold bg-purple-50 border-b-2 border-purple-700' : 'text-slate-700 hover:text-purple-700 hover:bg-slate-50' }}">
                        Profil Sekolah
                    </a>

                    <a href="{{ route('public.jurusan') }}" class="px-3.5 py-2 rounded transition-colors {{ request()->routeIs('public.jurusan') ? 'text-purple-700 font-bold bg-purple-50 border-b-2 border-purple-700' : 'text-slate-700 hover:text-purple-700 hover:bg-slate-50' }}">
                        Program Keahlian
                    </a>

                    <a href="{{ route('public.guru') }}" class="px-3.5 py-2 rounded transition-colors {{ request()->routeIs('public.guru') ? 'text-purple-700 font-bold bg-purple-50 border-b-2 border-purple-700' : 'text-slate-700 hover:text-purple-700 hover:bg-slate-50' }}">
                        Tenaga Pendidik
                    </a>

                    <a href="{{ route('public.kontak') }}" class="px-3.5 py-2 rounded transition-colors {{ request()->routeIs('public.kontak') ? 'text-purple-700 font-bold bg-purple-50 border-b-2 border-purple-700' : 'text-slate-700 hover:text-purple-700 hover:bg-slate-50' }}">
                        Kontak & Lokasi
                    </a>
                </nav>

                <div class="flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="hidden sm:inline-flex items-center px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm">
                            Dashboard SIA →
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Masuk SIA</span>
                        </a>
                    @endauth

                    <button 
                        type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden p-2 text-slate-600 hover:text-slate-900 border border-slate-200 rounded"
                        aria-label="Toggle Menu"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>

            </div>
        </div>

        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-white border-b border-slate-200 px-4 py-3 space-y-1 text-xs font-semibold text-slate-700">
            <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block py-2 px-2 rounded hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('home') ? 'bg-purple-50 text-purple-700 font-bold' : '' }}">Beranda</a>
            <a href="{{ route('public.profil') }}" @click="mobileMenuOpen = false" class="block py-2 px-2 rounded hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('public.profil') ? 'bg-purple-50 text-purple-700 font-bold' : '' }}">Profil Sekolah</a>
            <a href="{{ route('public.jurusan') }}" @click="mobileMenuOpen = false" class="block py-2 px-2 rounded hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('public.jurusan') ? 'bg-purple-50 text-purple-700 font-bold' : '' }}">Program Keahlian</a>
            <a href="{{ route('public.guru') }}" @click="mobileMenuOpen = false" class="block py-2 px-2 rounded hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('public.guru') ? 'bg-purple-50 text-purple-700 font-bold' : '' }}">Tenaga Pendidik</a>
            <a href="{{ route('public.kontak') }}" @click="mobileMenuOpen = false" class="block py-2 px-2 rounded hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('public.kontak') ? 'bg-purple-50 text-purple-700 font-bold' : '' }}">Kontak & Lokasi</a>
            <div class="pt-2 border-t border-slate-100">
                <a href="{{ route('login') }}" class="block text-center py-2 bg-purple-700 text-white rounded font-bold">Masuk Portal SIA</a>
            </div>
        </div>
    </header>

    @hasSection('page_header')
        <div class="bg-slate-900 text-white py-8 sm:py-10 border-b border-slate-800">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-purple-400">SMK Miyamasuzaka</span>
                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight mt-1 text-white">@yield('page_heading')</h1>
                        <p class="text-xs text-slate-300 mt-1 max-w-2xl">@yield('page_description')</p>
                    </div>
                    <div class="text-[11px] text-slate-400 sm:text-right">
                        <a href="{{ route('home') }}" class="hover:text-white">Beranda</a> / <span class="text-purple-400">@yield('page_heading')</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 pt-10 pb-6 text-xs mt-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-12 gap-8">
            
            <div class="md:col-span-5 space-y-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 bg-purple-700 text-white flex items-center justify-center font-bold text-base rounded shrink-0">
                        宮
                    </div>
                    <div>
                        <span class="text-sm font-bold text-white block leading-tight">SMK Miyamasuzaka Girls Academy</span>
                        <span class="text-[11px] text-slate-400">Pendidikan Kejuruan Putri Terpadu</span>
                    </div>
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    Sekolah Menengah Kejuruan Putri yang mengintegrasikan keunggulan akademik, sains terapan bio-farmasi, musik digital DTM, seni desain grafis visual, rekayasa software, dan manajemen media bisnis.
                </p>
                <div class="text-[11px] text-slate-400 space-y-0.5">
                    <div>Alamat: Miyamasuzaka 2-Chome, Shibuya-ku, Tokyo</div>
                    <div>Telepon: (03) 5468-0001 • Email: info@miyamasuzaka.test</div>
                </div>
            </div>

            <div class="md:col-span-4 space-y-2 text-[11px]">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-2">Program Keahlian</h3>
                <ul class="space-y-1.5 text-slate-400">
                    <li><a href="{{ route('public.jurusan') }}#smp" class="hover:text-purple-300 transition-colors">• Seni Musik Digital & DTM (SMP)</a></li>
                    <li><a href="{{ route('public.jurusan') }}#far" class="hover:text-purple-300 transition-colors">• Sains Terapan & Bio-Farmasi (FAR)</a></li>
                    <li><a href="{{ route('public.jurusan') }}#dkv" class="hover:text-purple-300 transition-colors">• Desain Komunikasi Visual (DKV)</a></li>
                    <li><a href="{{ route('public.jurusan') }}#rpl" class="hover:text-purple-300 transition-colors">• Rekayasa Software & IT (RPL)</a></li>
                    <li><a href="{{ route('public.jurusan') }}#mbm" class="hover:text-purple-300 transition-colors">• Manajemen Bisnis & Media (MBM)</a></li>
                </ul>
            </div>

            <div class="md:col-span-3 space-y-2 text-[11px]">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-2">Navigasi Halaman</h3>
                <ul class="space-y-1.5 text-slate-400">
                    <li><a href="{{ route('public.profil') }}" class="hover:text-white">• Profil Sekolah</a></li>
                    <li><a href="{{ route('public.jurusan') }}" class="hover:text-white">• Program Keahlian</a></li>
                    <li><a href="{{ route('public.guru') }}" class="hover:text-white">• Tenaga Pendidik</a></li>
                    <li><a href="{{ route('public.kontak') }}" class="hover:text-white">• Kontak & Lokasi</a></li>
                    <li><a href="{{ route('login') }}" class="text-purple-400 font-semibold hover:underline">• Portal SIA</a></li>
                </ul>
            </div>

        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-6 mt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-[11px] text-slate-500 gap-2">
            <div>&copy; 2026 SMK Miyamasuzaka Girls Academy. Hak Cipta Dilindungi.</div>
            <div class="text-slate-400">Sistem Informasi Akademik Resmi</div>
        </div>
    </footer>

</body>
</html>
