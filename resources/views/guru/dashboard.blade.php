@extends('layouts.guru')

@section('title', 'Dashboard Guru — SMK Miyamasuzaka (宮益坂女子学園)')
@section('heading', 'Halo, ' . $guru->nama)
@section('subheading', 'Panel instruktur kejuruan dan evaluasi penilaian akademik siswi.')

@section('content')
<div class="space-y-6">

    <!-- METRIC CARDS GURU (Solid Palette) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        
        <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm border-l-4 border-l-purple-700 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 block">Mata Pelajaran Diampu</span>
                <span class="text-2xl font-extrabold text-slate-900 mt-1 block">{{ $mapelCount }} Mapel</span>
                <span class="text-[11px] text-purple-700 font-semibold mt-0.5 block">{{ $guru->mata_pelajaran }}</span>
            </div>
            <div class="w-10 h-10 rounded bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm border-l-4 border-l-emerald-600 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 block">Total Nilai Terinput</span>
                <span class="text-2xl font-extrabold text-slate-900 mt-1 block">{{ number_format($nilaiCount) }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">Record Evaluasi Siswi</span>
            </div>
            <div class="w-10 h-10 rounded bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm border-l-4 border-l-sky-600 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 block">Rata-rata Nilai Siswi</span>
                <span class="text-2xl font-extrabold text-slate-900 mt-1 block">{{ $rataRata > 0 ? $rataRata : '—' }}</span>
                <span class="text-[11px] text-sky-700 font-semibold mt-0.5 block">Indeks Prestasi Kelas</span>
            </div>
            <div class="w-10 h-10 rounded bg-sky-50 text-sky-700 flex items-center justify-center font-bold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
        </div>

    </div>

    <!-- TATA LETAK DUA KOLOM -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Mata Pelajaran Diampu (4 Cols) -->
        <div class="lg:col-span-5 bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                <h3 class="text-sm font-bold text-slate-900">Mata Pelajaran yang Diampu</h3>
                <span class="text-[11px] text-purple-700 font-semibold font-mono">{{ $guru->nip }}</span>
            </div>

            <div class="space-y-2.5 text-xs">
                @forelse ($mapels as $m)
                    <div class="p-3 bg-slate-50 border border-slate-200 rounded flex items-center justify-between">
                        <div>
                            <span class="font-bold text-slate-900 block">{{ $m->nama }}</span>
                            <span class="text-[11px] text-slate-500 font-mono">{{ $m->kode }}</span>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                            {{ $m->nilais_count }} Nilai
                        </span>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 text-center py-4">Belum ada mata pelajaran terkait.</p>
                @endforelse
            </div>
        </div>

        <!-- Nilai Terbaru (7 Cols) -->
        <div class="lg:col-span-7 bg-white border border-slate-200 rounded-lg p-5 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                <h3 class="text-sm font-bold text-slate-900">Entri Nilai Terbaru</h3>
                <a href="{{ route('guru.nilai.index') }}" class="text-xs font-bold text-purple-700 hover:underline">
                    Buka Form Input Nilai →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase">
                            <th class="py-2.5 px-3">Nama Siswi</th>
                            <th class="py-2.5 px-3">Mapel</th>
                            <th class="py-2.5 px-3">Evaluasi</th>
                            <th class="py-2.5 px-3 text-right">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($nilaiTerbaru as $n)
                            <tr class="hover:bg-slate-50">
                                <td class="py-2.5 px-3 font-semibold text-slate-900">{{ $n->siswa->nama ?? '—' }}</td>
                                <td class="py-2.5 px-3 text-slate-600">{{ $n->mapel->nama ?? '—' }}</td>
                                <td class="py-2.5 px-3 text-slate-500">{{ $n->jenis_nilai }}</td>
                                <td class="py-2.5 px-3 text-right font-mono font-bold text-purple-700">{{ $n->nilai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-400">Belum ada catatan nilai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
