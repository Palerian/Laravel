@extends('layouts.public')

@section('title', 'SMK Miyamasuzaka Girls Academy — Web Resmi Sekolah')

@section('content')
<div class="space-y-12 sm:space-y-16">

    <section class="max-w-6xl mx-auto px-4 sm:px-6 pt-4" x-data="{
        activeSlide: 0,
        totalSlides: 3,
        autoPlayTimer: null,
        startAutoPlay() {
            this.autoPlayTimer = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
            }, 5000);
        },
        stopAutoPlay() {
            if (this.autoPlayTimer) clearInterval(this.autoPlayTimer);
        },
        nextSlide() {
            this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
        },
        prevSlide() {
            this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
        }
    }" x-init="startAutoPlay()" @mouseenter="stopAutoPlay()" @mouseleave="startAutoPlay()">

        <div class="relative bg-slate-900 rounded-xl overflow-hidden shadow-lg border border-slate-800 text-white min-h-[380px] sm:min-h-[440px] flex items-center">
            
            <div x-show="activeSlide === 0" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="w-full p-6 sm:p-12">
                <div class="max-w-2xl space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-purple-800/80 text-purple-200 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Penerimaan Siswi Baru & Tahun Ajaran 2026/2027
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white leading-tight">
                        Membangun Generasi Unggul di Bidang Sains Terapan, Seni Musik Digital & Teknologi
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        SMK Miyamasuzaka Girls Academy menyelenggarakan pendidikan kejuruan putri berbasis praktik industri modern dengan kurikulum berstandar unggul di kawasan Shibuya.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="{{ route('public.jurusan') }}" class="px-5 py-2.5 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                            Jelajahi 5 Program Keahlian →
                        </a>
                        <a href="{{ route('public.profil') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-semibold text-xs rounded transition-colors">
                            Profil Sekolah
                        </a>
                    </div>
                </div>
            </div>

            <div x-show="activeSlide === 1" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="w-full p-6 sm:p-12">
                <div class="max-w-2xl space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-purple-800/80 text-purple-200 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                        Fasilitas Laboratorium & Studio Modern
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white leading-tight">
                        Studio Musik Digital DTM, Lab Bio-Farmasi, & Workstation Desain Multimedia
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Didukung perangkat industri profesional dan workstation mutakhir untuk mengasah kompetensi teknis siswi secara langsung.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="{{ route('public.jurusan') }}" class="px-5 py-2.5 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                            Lihat Kurikulum Kejuruan →
                        </a>
                        <a href="{{ route('public.guru') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-semibold text-xs rounded transition-colors">
                            Dewan Guru Pengampu
                        </a>
                    </div>
                </div>
            </div>

            <div x-show="activeSlide === 2" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="w-full p-6 sm:p-12">
                <div class="max-w-2xl space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-purple-800/80 text-purple-200 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Sistem Informasi Akademik Terintegrasi
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white leading-tight">
                        Portal Akademik Digital Siswi, Guru, dan Penilaian Rapor Real-Time
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Akses rekap jadwal pelajaran 18 rombel kelas, penilaian evaluasi belajar, dan direktori akademik secara mandiri dan cepat.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="{{ route('login') }}" class="px-5 py-2.5 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                            Masuk Portal SIA Sekolah →
                        </a>
                        <a href="{{ route('public.kontak') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-semibold text-xs rounded transition-colors">
                            Akses & Kontak Kampus
                        </a>
                    </div>
                </div>
            </div>

            <button type="button" @click="prevSlide()" class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-slate-800/80 hover:bg-purple-700 text-white rounded-full flex items-center justify-center transition-colors border border-slate-700" aria-label="Slide Sebelumnya">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <button type="button" @click="nextSlide()" class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 bg-slate-800/80 hover:bg-purple-700 text-white rounded-full flex items-center justify-center transition-colors border border-slate-700" aria-label="Slide Selanjutnya">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2">
                <button type="button" @click="activeSlide = 0" class="h-2 rounded-full transition-all" :class="activeSlide === 0 ? 'w-7 bg-purple-500' : 'w-2 bg-slate-600'" aria-label="Pilih slide 1"></button>
                <button type="button" @click="activeSlide = 1" class="h-2 rounded-full transition-all" :class="activeSlide === 1 ? 'w-7 bg-purple-500' : 'w-2 bg-slate-600'" aria-label="Pilih slide 2"></button>
                <button type="button" @click="activeSlide = 2" class="h-2 rounded-full transition-all" :class="activeSlide === 2 ? 'w-7 bg-purple-500' : 'w-2 bg-slate-600'" aria-label="Pilih slide 3"></button>
            </div>

        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-white border border-slate-200 rounded-lg p-3 sm:p-4 shadow-sm flex items-center gap-3 overflow-hidden">
            <div class="flex items-center gap-2 px-3 py-1 bg-purple-700 text-white text-xs font-bold rounded shrink-0">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                <span>Warta Sekolah</span>
            </div>
            
            <div class="flex-1 overflow-hidden whitespace-nowrap">
                <div class="inline-block animate-[marquee_25s_linear_infinite] text-xs text-slate-700 space-x-8">
                    <span>• Selamat Datang di Portal Resmi SMK Miyamasuzaka Girls Academy</span>
                    <span>• Perkuliahan Kejuruan Semester Ganjil T.A. 2026/2027 Aktif Berjalan di 18 Rombel</span>
                    <span>• Siswi Teladan: Asahina Mafuyu (Kelas XI FAR 1) Mempertahankan IPK Sempurna 4.00</span>
                    <span>• Pendaftaran Uji Kompetensi Keahlian Kejuruan Musik DTM dan Farmasi Dibuka</span>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-slate-200 rounded-lg p-5 border-l-4 border-l-purple-700 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Total Siswi Aktif</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">600</p>
                <span class="text-[11px] text-purple-700 font-semibold mt-1 block">18 Rombongan Belajar</span>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 border-l-4 border-l-slate-700 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Dewan Guru</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">45</p>
                <span class="text-[11px] text-slate-600 font-medium mt-1 block">Tenaga Pengajar Spesialis</span>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 border-l-4 border-l-purple-700 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Mata Pelajaran</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">28</p>
                <span class="text-[11px] text-purple-700 font-semibold mt-1 block">Muatan Kejuruan & Umum</span>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 border-l-4 border-l-emerald-600 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Akreditasi Sekolah</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">A</p>
                <span class="text-[11px] text-emerald-700 font-semibold mt-1 block">Predikat Unggul</span>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-4 flex flex-col items-center text-center p-6 bg-slate-50 border border-slate-200 rounded-lg">
                    <div class="w-20 h-20 bg-purple-700 text-white rounded-full flex items-center justify-center font-bold text-3xl shadow-sm mb-3">
                        宮
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Shizuka Asahina, M.Ed.</h3>
                    <p class="text-xs text-purple-700 font-semibold">Kepala SMK Miyamasuzaka</p>
                    <span class="text-[11px] text-slate-500 mt-1">NIP: 197504122000012001</span>
                </div>

                <div class="lg:col-span-8 space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Sambutan Kepala Sekolah</span>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 leading-snug">
                        Mendidik dengan Ketelitian Sains, Kepekaan Seni, dan Karakter Kepemimpinan
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Selamat datang di portal resmi SMK Miyamasuzaka Girls Academy. Kami mendedikasikan seluruh ekosistem pembelajaran kejuruan ini untuk membekali para siswi dengan keahlian praktis berstandar industri modern, didukung penanaman budi pekerti luhur dan integritas moral yang kokoh.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('public.profil') }}" class="text-xs font-bold text-purple-700 hover:text-purple-800 inline-flex items-center gap-1">
                            Baca Selengkapnya Profil & Visi Misi Sekolah →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 space-y-6">
        <div class="border-b border-slate-200 pb-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Program Keahlian</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mt-0.5">5 Pilihan Jurusan SMK Miyamasuzaka</h2>
            </div>
            <a href="{{ route('public.jurusan') }}" class="text-xs font-bold text-purple-700 hover:underline">
                Rincian Kurikulum Lengkap →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            
            <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-3 hover:border-purple-300 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200 font-mono">
                        SMP-01
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Musik Digital</span>
                </div>
                <h3 class="text-sm font-bold text-slate-900">Seni Musik Digital & DTM Synthesizer</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Penguasaan aransemen musik digital DAW, komposisi synthesizer, penulisan lirik ekspresif, dan perekaman audio studio berstandar industri.
                </p>
                <div class="text-[11px] text-purple-700 font-semibold pt-1 border-t border-slate-100">
                    Kompetensi: Music Producer, Sound Engineer, Songwriter
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-3 hover:border-purple-300 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 font-mono">
                        FAR-02
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Bio-Farmasi</span>
                </div>
                <h3 class="text-sm font-bold text-slate-900">Sains Terapan & Bio-Farmasi Klinis</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Pembelajaran biologi sel eksperimental, kimia farmasi laboratorium, riset dasar medis, dan analisis kesehatan terapan.
                </p>
                <div class="text-[11px] text-emerald-700 font-semibold pt-1 border-t border-slate-100">
                    Kompetensi: Laboran Medis, Asisten Farmasi, Analis Sains
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-3 hover:border-purple-300 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-sky-50 text-sky-700 border border-sky-200 font-mono">
                        DKV-03
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Desain Grafis</span>
                </div>
                <h3 class="text-sm font-bold text-slate-900">Desain Komunikasi Visual & Media</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Keahlian ilustrasi digital, tipografi formal, artwork media kreatif, visual storytelling, branding, dan desain grafis publikasi.
                </p>
                <div class="text-[11px] text-sky-700 font-semibold pt-1 border-t border-slate-100">
                    Kompetensi: Ilustrator Digital, Graphic Designer, UI Designer
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-3 hover:border-purple-300 transition-colors">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 font-mono">
                        RPL-04
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Software & IT</span>
                </div>
                <h3 class="text-sm font-bold text-slate-900">Rekayasa Software & Sistem Informasi</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Pengembangan aplikasi web modern, manajemen basis data relasional, arsitektur cloud akademik, dan pemrograman terapan.
                </p>
                <div class="text-[11px] text-indigo-700 font-semibold pt-1 border-t border-slate-100">
                    Kompetensi: Web Developer, Software Engineer, Data Admin
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-3 hover:border-purple-300 transition-colors md:col-span-2 lg:col-span-1">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200 font-mono">
                        MBM-05
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Manajemen Media</span>
                </div>
                <h3 class="text-sm font-bold text-slate-900">Manajemen Bisnis Pertunjukan & Media</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Tata kelola event kreatif, pemasaran media digital, public relations institusi, kewirausahaan, dan akuntansi bisnis hiburan.
                </p>
                <div class="text-[11px] text-amber-700 font-semibold pt-1 border-t border-slate-100">
                    Kompetensi: Event Manager, Media Producer, PR Specialist
                </div>
            </div>

        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-200 pb-3 gap-2">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Tenaga Pendidik</span>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mt-0.5">Dewan Guru & Praktisi Kejuruan</h2>
                </div>
                <a href="{{ route('public.guru') }}" class="text-xs font-bold text-purple-700 hover:underline">
                    Lihat Seluruh 45 Guru Pengampu →
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($gurus as $guru)
                    <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg flex items-center gap-3">
                        <x-avatar :user="$guru->user" size="lg" />
                        <div class="min-w-0 flex-1 text-xs">
                            <h4 class="font-bold text-slate-900 truncate">{{ $guru->nama }}</h4>
                            <p class="text-[11px] text-purple-700 font-semibold truncate">{{ $guru->mata_pelajaran }}</p>
                            <span class="text-[10px] text-slate-400 font-mono">NIP: {{ $guru->nip }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-slate-900 text-white border border-slate-800 rounded-lg p-6 sm:p-8 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <div class="lg:col-span-8 space-y-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-purple-400">Lokasi & Akses Kampus</span>
                    <h3 class="text-lg sm:text-xl font-bold text-white">Akses Kampus SMK Miyamasuzaka</h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Kampus terpadu terletak strategis di kawasan Miyamasuzaka 2-Chome, Shibuya. Berjarak 3 menit jalan kaki dari Stasiun Shibuya.
                    </p>
                    <div class="text-[11px] text-slate-400 pt-1">
                        Alamat Resmi: Miyamasuzaka 2-Chome, Shibuya-ku, Tokyo
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-2">
                    <a href="{{ route('public.kontak') }}" class="w-full text-center py-2 px-4 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                        Panduan Rute & Kontak Lengkap →
                    </a>
                    <a href="{{ route('login') }}" class="w-full text-center py-2 px-4 bg-slate-800 hover:bg-slate-700 text-purple-300 border border-slate-700 font-semibold text-xs rounded transition-colors">
                        Masuk Portal SIA Sekolah
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
