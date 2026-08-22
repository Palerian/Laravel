@extends('layouts.admin')

@section('title', 'Dashboard — SMK Miyamasuzaka')
@section('heading', 'Dashboard Administrator')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-200">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">Dasbor Akademik SMK Miyamasuzaka</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Pusat data informasi terpadu kejuruan musik digital DTM, sains bio-farmasi, DKV, RPL, dan manajemen media.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.nilai.analisis') }}" class="px-3 py-1.5 text-xs font-semibold text-slate-700 bg-white border border-slate-300 rounded hover:bg-slate-50 flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <span>Analisis Rapor</span>
            </a>
            <a href="{{ route('admin.siswa.create') }}" class="px-3.5 py-1.5 text-xs font-semibold text-white bg-purple-700 hover:bg-purple-800 rounded flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Siswi Baru</span>
            </a>
        </div>
    </div>

    <section aria-labelledby="ringkasan-title">
        <div class="flex items-center justify-between mb-3">
            <h2 id="ringkasan-title" class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-700 inline-block rounded-full"></span>
                Ringkasan Data Akademik SMK Miyamasuzaka
            </h2>
            <span class="text-xs text-slate-500 font-medium">Tercatat: {{ number_format($siswaCount ?? 600) }} Siswi • {{ $guruCount ?? 45 }} Guru • {{ $mapelCount ?? 28 }} Mapel</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-5 border border-slate-200 rounded-lg border-l-4 border-l-purple-700 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Total Siswi</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($siswaCount ?? 600) }}</p>
                <div class="mt-1 text-[11px] text-purple-700 font-semibold">
                    <span>600 Siswi (18 Rombel)</span>
                </div>
            </div>

            <div class="bg-white p-5 border border-slate-200 rounded-lg border-l-4 border-l-slate-700 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Tenaga Guru</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ $guruCount ?? 45 }}</p>
                <div class="mt-1 text-[11px] text-slate-600 font-medium">
                    <span>Dewan Guru Pengampu</span>
                </div>
            </div>

            <div class="bg-white p-5 border border-slate-200 rounded-lg border-l-4 border-l-sky-600 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Mata Pelajaran</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ $mapelCount ?? 28 }}</p>
                <div class="mt-1 text-[11px] text-sky-700 font-semibold">
                    <span>5 Program Keahlian</span>
                </div>
            </div>

            <div class="bg-white p-5 border border-slate-200 rounded-lg border-l-4 border-l-emerald-600 shadow-sm">
                <span class="text-xs font-semibold text-slate-500 block">Penilaian Rapor</span>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($nilaiCount ?? 0) }}</p>
                <div class="mt-1 text-[11px] text-emerald-700 font-medium">
                    <span>Nilai Evaluasi Terdata</span>
                </div>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-5 space-y-4">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-purple-700 rounded-full"></span>
                        <h3 class="text-sm font-bold text-slate-900">Jadwal Pelajaran Hari Ini</h3>
                    </div>
                    <span class="inline-block px-2 py-0.5 text-[11px] font-semibold rounded bg-purple-50 text-purple-700 border border-purple-200">
                        Aktif
                    </span>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse ($jadwalHariIni as $j)
                        <div class="p-3.5 hover:bg-slate-50 transition-colors">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-bold text-slate-900">{{ $j->mapel->nama ?? $j['mapel'] }}</span>
                                <span class="inline-block px-1.5 py-0.2 text-[10px] font-semibold rounded bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Berlangsung
                                </span>
                            </div>
                            <div class="text-[11px] text-purple-700 font-semibold mb-1">Kelas {{ $j->kelas ?? $j['kelas'] }} • {{ substr($j->jam_mulai ?? $j['jam'], 0, 5) }} - {{ substr($j->jam_selesai ?? '', 0, 5) }}</div>
                            <div class="text-[11px] text-slate-500">
                                Guru Pengampu: <strong class="text-slate-700">{{ $j->mapel->guru->nama ?? 'Guru Miyamasuzaka' }}</strong>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 text-center text-xs text-slate-400">Tidak ada jadwal pelajaran tercatat untuk hari ini.</div>
                    @endforelse
                </div>

                <div class="p-3 bg-slate-50 border-t border-slate-200 text-center">
                    <a href="{{ route('admin.jadwal.index') }}" class="text-xs font-semibold text-purple-700 hover:text-purple-800">Lihat Seluruh Jadwal 18 Rombel SMK →</a>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 space-y-4">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-purple-700 rounded-full"></span>
                            <h3 class="text-sm font-bold text-slate-900">Daftar Siswi Terdaftar</h3>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Program Keahlian SMP, FAR, DKV, RPL, dan MBM.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.siswa.index') }}" class="text-xs text-purple-700 font-bold hover:underline">Lihat Semua 600 Siswi →</a>
                    </div>
                </div>

                <div class="overflow-x-auto max-h-[520px] overflow-y-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase tracking-wider sticky top-0 bg-slate-50 z-10">
                                <th class="py-2.5 px-4 border-r border-slate-200">NIS</th>
                                <th class="py-2.5 px-4 border-r border-slate-200">Nama Siswi</th>
                                <th class="py-2.5 px-4 border-r border-slate-200">Kelas Rombel</th>
                                <th class="py-2.5 px-4 border-r border-slate-200 text-center">L/P</th>
                                <th class="py-2.5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse ($siswaTerbaru as $m)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-2.5 px-4 font-mono font-semibold text-slate-600 border-r border-slate-100">{{ $m->nis }}</td>
                                    <td class="py-2.5 px-4 border-r border-slate-100 font-bold text-slate-900">
                                        {{ $m->nama }}
                                    </td>
                                    <td class="py-2.5 px-4 font-semibold text-slate-700 border-r border-slate-100">
                                        <span class="inline-block px-1.5 py-0.5 rounded bg-purple-50 text-purple-700 border border-purple-200 text-[11px] font-mono">
                                            {{ $m->kelas }}
                                        </span>
                                    </td>
                                    <td class="py-2.5 px-4 text-center border-r border-slate-100">
                                        <span class="inline-block px-1.5 py-0.5 text-[10px] font-semibold rounded bg-purple-50 text-purple-700 border border-purple-200">
                                            {{ $m->jenis_kelamin }}
                                        </span>
                                    </td>
                                    <td class="py-2.5 px-4 text-center">
                                        <a href="{{ route('admin.siswa.show', $m->id) }}" class="px-2.5 py-1 text-[11px] font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 rounded transition-colors">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-slate-400">Belum ada data siswi terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-3 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-slate-600">
                    <div>
                        Total <strong>{{ number_format($siswaCount ?? 600) }}</strong> siswi terdaftar di SMK Miyamasuzaka.
                    </div>
                    <a href="{{ route('admin.siswa.index') }}" class="px-3 py-1.5 bg-purple-700 text-white font-semibold rounded text-xs hover:bg-purple-800 transition-colors shadow-sm">
                        Buka Master Data 600 Siswi →
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
