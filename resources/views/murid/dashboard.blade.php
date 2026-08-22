@extends('layouts.murid')

@section('title', 'Dashboard Siswi — SMK Miyamasuzaka (宮益坂女子学園)')
@section('heading', 'Halo, ' . $user->name)
@section('subheading', 'Ringkasan biodata akademik dan hasil evaluasi belajar siswi.')

@section('content')
<div class="space-y-6">

    @unless ($siswa)
        <div class="bg-white border border-amber-200 rounded-lg p-6 shadow-sm space-y-3 border-l-4 border-l-amber-500">
            <h2 class="text-sm font-bold text-amber-900">Profil Akademik Belum Ditautkan</h2>
            <p class="text-xs text-slate-600 leading-relaxed">
                Akunmu sudah aktif, namun data siswi (NIS & Kelas Rombel) belum ditautkan oleh Administrator. Kamu tetap dapat menyunting profil dan foto akunmu.
            </p>
            <div class="pt-2">
                <a href="{{ route('profile.show', $user->id) }}" class="px-3.5 py-1.5 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm inline-block">
                    Sunting Profil & Foto Siswi →
                </a>
            </div>
        </div>
    @else
        <!-- 1. KARTU PROFIL BIODATA SISWI -->
        <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <x-avatar :user="$user" size="lg" />
                <div>
                    <div class="flex items-center gap-2">
                        <h2 class="text-base font-bold text-slate-900">{{ $siswa->nama }}</h2>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                            Siswi Reguler
                        </span>
                    </div>
                    <p class="text-xs text-slate-600 mt-0.5">
                        NIS: <span class="font-mono font-bold text-slate-800">{{ $siswa->nis }}</span> • Kelas Rombel: <span class="font-bold text-purple-700 font-mono">{{ $siswa->kelas }}</span>
                    </p>
                    <p class="text-[11px] text-slate-500 mt-0.5">
                        Domisili: <strong>{{ $siswa->alamat }}</strong> • Kelamin: {{ $siswa->jenis_kelamin === 'P' ? 'Perempuan' : 'Laki-laki' }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start sm:self-auto">
                <a href="{{ route('profile.show', $user->id) }}" class="px-3.5 py-2 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>Ganti Foto & Edit Profil</span>
                </a>
            </div>
        </div>

        <!-- 2. METRIC REKAP NILAI AKADEMIK -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm border-l-4 border-l-purple-700 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-500 block">Rata-rata Rapor</span>
                    <span class="text-2xl font-extrabold text-slate-900 mt-1 block">
                        {{ $rataRata !== null ? number_format($rataRata, 1) : '—' }}
                    </span>
                    <span class="text-[11px] text-purple-700 font-semibold mt-0.5 block">Indeks Prestasi</span>
                </div>
                <div class="w-10 h-10 rounded bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm border-l-4 border-l-emerald-600 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-500 block">Nilai Tertinggi</span>
                    <span class="text-2xl font-extrabold text-slate-900 mt-1 block">
                        {{ $tertinggi ?? '—' }}
                    </span>
                    <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">Pencapaian Terbaik</span>
                </div>
                <div class="w-10 h-10 rounded bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm border-l-4 border-l-amber-500 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-500 block">Nilai Terendah</span>
                    <span class="text-2xl font-extrabold text-slate-900 mt-1 block">
                        {{ $terendah ?? '—' }}
                    </span>
                    <span class="text-[11px] text-amber-700 font-semibold mt-0.5 block">Evaluasi Perbaikan</span>
                </div>
                <div class="w-10 h-10 rounded bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm border-l-4 border-l-sky-600 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-500 block">Mapel Dinilai</span>
                    <span class="text-2xl font-extrabold text-slate-900 mt-1 block">{{ $mapelCount }}</span>
                    <span class="text-[11px] text-sky-700 font-semibold mt-0.5 block">Mata Pelajaran Tuntas</span>
                </div>
                <div class="w-10 h-10 rounded bg-sky-50 text-sky-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
            </div>

        </div>

        <!-- 3. TABEL DETAIL RAPOR HASIL BELAJAR SISWI -->
        <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
            <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="text-sm font-bold text-slate-900">Transkrip Evaluasi Nilai Akademik Siswi</h3>
                <span class="text-xs text-slate-500">Semester 1 • T.A. 2026/2027</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase">
                            <th class="py-2.5 px-4">Kode</th>
                            <th class="py-2.5 px-4">Mata Pelajaran</th>
                            <th class="py-2.5 px-4">Evaluasi</th>
                            <th class="py-2.5 px-4 text-center">Predikat</th>
                            <th class="py-2.5 px-4 text-right">Nilai Angka</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($nilais as $n)
                            @php
                                $pred = 'D';
                                if ($n->nilai >= 90) $pred = 'A (Sangat Baik)';
                                elseif ($n->nilai >= 80) $pred = 'B (Baik)';
                                elseif ($n->nilai >= 70) $pred = 'C (Cukup)';
                            @endphp
                            <tr class="hover:bg-slate-50">
                                <td class="py-2.5 px-4 font-mono text-slate-500 font-semibold">{{ $n->mapel->kode ?? '—' }}</td>
                                <td class="py-2.5 px-4 font-bold text-slate-900">{{ $n->mapel->nama ?? '—' }}</td>
                                <td class="py-2.5 px-4 text-slate-600">{{ $n->jenis_nilai }}</td>
                                <td class="py-2.5 px-4 text-center">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold {{ $n->nilai >= 90 ? 'bg-purple-50 text-purple-700 border border-purple-200' : 'bg-slate-100 text-slate-700 border border-slate-200' }}">
                                        {{ $pred }}
                                    </span>
                                </td>
                                <td class="py-2.5 px-4 text-right font-mono font-bold text-purple-700 text-sm">{{ $n->nilai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400">Belum ada catatan nilai yang terdata di sistem.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endunless

</div>
@endsection
