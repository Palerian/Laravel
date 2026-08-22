@extends('layouts.public')

@section('title', 'Kontak & Akses Kampus — SMK Miyamasuzaka')
@section('page_heading', 'Kontak & Lokasi Kampus')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-8">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-5 bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-6">
            <div class="border-b border-slate-200 pb-4">
                <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Informasi Resmi</span>
                <h2 class="text-lg font-bold text-slate-900 mt-1">Sekretariat & Tata Usaha</h2>
                <p class="text-xs text-slate-500 mt-0.5">Layanan administrasi siswi, informasi kurikulum, dan kemitraan industri.</p>
            </div>

            <div class="space-y-4 text-xs">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-semibold">Alamat Kampus:</strong>
                        <span class="text-slate-600">SMK Miyamasuzaka Girls Academy</span><br>
                        <span class="text-slate-500">Miyamasuzaka 2-Chome, Shibuya-ku, Tokyo</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-semibold">Telepon Sekretariat:</strong>
                        <span class="text-slate-600 font-mono">(03) 5468-0001 (Hunting)</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-semibold">Email Resmi:</strong>
                        <span class="text-slate-600 font-mono">info@miyamasuzaka.test</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-semibold">Jam Operasional Layanan:</strong>
                        <span class="text-slate-600">Senin – Jumat: 07.30 – 16.30</span><br>
                        <span class="text-slate-600">Sabtu: 07.30 – 13.00</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm space-y-5">
            <div class="border-b border-slate-200 pb-4">
                <span class="text-xs font-bold uppercase tracking-wider text-purple-700">Panduan Akses Transportasi</span>
                <h2 class="text-lg font-bold text-slate-900 mt-1">Petunjuk Menuju Kampus</h2>
            </div>

            <div class="space-y-4 text-xs text-slate-600 leading-relaxed">
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-1.5">
                    <strong class="text-slate-900 block text-xs">Jalur Kereta / Subway:</strong>
                    <p>
                        Turun di <strong>Stasiun Shibuya</strong>, keluar melalui Pintu Keluar Miyamasuzaka, lalu berjalan kaki menaiki jalan Miyamasuzaka sekitar 3 menit menuju gerbang utama kampus.
                    </p>
                </div>

                <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-1.5">
                    <strong class="text-slate-900 block text-xs">Jalur Bus Kota:</strong>
                    <p>
                        Gunakan bus kota rute Shibuya-ekimae, turun di halte Miyamasuzaka-shita, lalu berjalan kaki 100 meter ke arah timur.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
