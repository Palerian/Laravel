@extends('layouts.admin')

@section('title', 'Analisis & Rekap Nilai Akademik — SMK Miyamasuzaka')
@section('heading', 'Analisis & Rekapitulasi Nilai')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-200">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">Analisis & Rekapitulasi Nilai Siswi</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Statistik distribusi predikat, leaderboard akademik, dan rekapitulasi nilai seluruh kelas SMK Miyamasuzaka.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.nilai.export') }}" class="px-3.5 py-2 text-xs font-semibold text-white bg-purple-700 hover:bg-purple-800 rounded flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                <span>Ekspor CSV Rekap Nilai</span>
            </a>
            <a href="{{ route('admin.nilai.index') }}" class="px-3.5 py-2 text-xs font-semibold text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 rounded flex items-center gap-1.5 transition-colors">
                <span>Daftar Nilai Reguler</span>
            </a>
        </div>
    </div>

    <!-- Ringkasan Statistik Nilai -->
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-3">
        <div class="bg-white p-4 border border-slate-200 rounded-lg border-l-4 border-l-purple-700 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block">Rerata Sekolah</span>
            <p class="text-2xl font-bold text-slate-900 mt-1">{{ $overallAverage }}</p>
            <div class="mt-1 text-[11px] text-purple-700 font-semibold">Amat Baik (A/B)</div>
        </div>

        <div class="bg-white p-4 border border-slate-200 rounded-lg border-l-4 border-l-emerald-600 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block">Predikat A (≥ 90)</span>
            <p class="text-2xl font-bold text-emerald-700 mt-1">{{ $distA }} Nilai</p>
            <div class="mt-1 text-[11px] text-slate-500 font-medium">Sangat Memuaskan</div>
        </div>

        <div class="bg-white p-4 border border-slate-200 rounded-lg border-l-4 border-l-sky-600 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block">Predikat B (80 - 89)</span>
            <p class="text-2xl font-bold text-sky-700 mt-1">{{ $distB }} Nilai</p>
            <div class="mt-1 text-[11px] text-slate-500 font-medium">Baik / Kompeten</div>
        </div>

        <div class="bg-white p-4 border border-slate-200 rounded-lg border-l-4 border-l-amber-500 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block">Predikat C (70 - 79)</span>
            <p class="text-2xl font-bold text-amber-700 mt-1">{{ $distC }} Nilai</p>
            <div class="mt-1 text-[11px] text-slate-500 font-medium">Cukup / Perbaikan</div>
        </div>

        <div class="bg-white p-4 border border-slate-200 rounded-lg border-l-4 border-l-slate-600 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block">Total Entri Nilai</span>
            <p class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($totalNilaiCount) }}</p>
            <div class="mt-1 text-[11px] text-slate-500 font-medium">{{ $totalSiswaCount }} Siswi Terdata</div>
        </div>
    </div>

    <!-- Filter Kelas -->
    <div class="bg-white p-4 border border-slate-200 rounded-lg shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Filter Rombel:</span>
            <div class="flex flex-wrap gap-1.5">
                <a href="{{ route('admin.nilai.analisis', ['kelas' => 'all']) }}" class="px-2.5 py-1 text-xs rounded font-semibold {{ $selectedKelas === 'all' ? 'bg-purple-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    Semua Kelas
                </a>
                @foreach ($kelasList as $k)
                    <a href="{{ route('admin.nilai.analisis', ['kelas' => $k]) }}" class="px-2.5 py-1 text-xs rounded font-semibold {{ $selectedKelas === $k ? 'bg-purple-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        {{ $k }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Tabel Leaderboard & Ranking Siswi -->
    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-bold text-slate-900">Peringkat Akademik Siswi (Kelas: {{ $selectedKelas === 'all' ? 'Semua' : $selectedKelas }})</h2>
                <p class="text-xs text-slate-500 mt-0.5">Urutan berdasarkan rata-rata akumulasi nilai Tugas, UH, UTS, dan UAS.</p>
            </div>
            <span class="text-xs text-slate-500 font-semibold">{{ count($leaderboard) }} Siswi Ditampilkan</span>
        </div>

        <div class="overflow-x-auto max-h-[500px] overflow-y-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase tracking-wider sticky top-0 bg-slate-50 z-10">
                        <th class="py-2.5 px-4 text-center w-16">Rank</th>
                        <th class="py-2.5 px-4">NIS</th>
                        <th class="py-2.5 px-4">Nama Siswi</th>
                        <th class="py-2.5 px-4">Kelas</th>
                        <th class="py-2.5 px-4 text-center">L/P</th>
                        <th class="py-2.5 px-4 text-center">Jml Mapel</th>
                        <th class="py-2.5 px-4 text-right">Rata-Rata</th>
                        <th class="py-2.5 px-4 text-center">Predikat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($leaderboard as $idx => $item)
                        @php
                            $s = $item['siswa'];
                            $avg = $item['rata_rata'];
                        @endphp
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-2.5 px-4 text-center font-bold">
                                @if($idx === 0)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 text-amber-800 text-xs font-extrabold border border-amber-300">1</span>
                                @elseif($idx === 1)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-slate-200 text-slate-800 text-xs font-extrabold border border-slate-300">2</span>
                                @elseif($idx === 2)
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-50 text-amber-700 text-xs font-extrabold border border-amber-200">3</span>
                                @else
                                    <span class="text-slate-500 font-mono">{{ $idx + 1 }}</span>
                                @endif
                            </td>
                            <td class="py-2.5 px-4 font-mono text-slate-600 font-semibold">{{ $s->nis }}</td>
                            <td class="py-2.5 px-4">
                                <span class="font-bold text-slate-900">{{ $s->nama }}</span>
                            </td>
                            <td class="py-2.5 px-4 font-semibold text-slate-700">
                                <span class="px-1.5 py-0.5 rounded bg-purple-50 text-purple-700 border border-purple-200 text-[11px] font-mono">
                                    {{ $s->kelas }}
                                </span>
                            </td>
                            <td class="py-2.5 px-4 text-center">
                                <span class="inline-block px-1.5 py-0.5 text-[10px] font-semibold rounded bg-purple-50 text-purple-700 border border-purple-200">
                                    {{ $s->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="py-2.5 px-4 text-center text-slate-600 font-medium">{{ $item['total_nilai'] }}</td>
                            <td class="py-2.5 px-4 text-right font-mono font-bold {{ $avg >= 90 ? 'text-emerald-700' : ($avg >= 80 ? 'text-slate-900' : 'text-amber-700') }}">
                                {{ number_format($avg, 2) }}
                            </td>
                            <td class="py-2.5 px-4 text-center">
                                @if($avg >= 90)
                                    <span class="inline-block px-2 py-0.5 text-[11px] font-bold rounded bg-emerald-50 text-emerald-700 border border-emerald-200">A</span>
                                @elseif($avg >= 80)
                                    <span class="inline-block px-2 py-0.5 text-[11px] font-bold rounded bg-sky-50 text-sky-700 border border-sky-200">B</span>
                                @elseif($avg >= 70)
                                    <span class="inline-block px-2 py-0.5 text-[11px] font-bold rounded bg-amber-50 text-amber-700 border border-amber-200">C</span>
                                @else
                                    <span class="inline-block px-2 py-0.5 text-[11px] font-bold rounded bg-rose-50 text-rose-700 border border-rose-200">D</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-slate-400">Tidak ada data nilai untuk kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
