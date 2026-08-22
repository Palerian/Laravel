@extends('layouts.admin')

@section('title', 'Data Siswi — SMK Miyamasuzaka')
@section('heading', 'Data Peserta Didik (600 Siswi)')

@section('content')
<div class="space-y-5">

    <!-- Header Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-3 border-b border-slate-200">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">Database Siswi SMK Miyamasuzaka</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Kelola data 600 peserta didik aktif kejuruan, nomor induk siswa (NIS), rombel kelas, dan riwayat akademik.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center px-3 py-1.5 rounded text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                Total: {{ $siswas->total() }} Siswi Ditemukan
            </span>
            <a href="{{ route('admin.siswa.create') }}" class="px-3.5 py-1.5 text-xs font-semibold text-white bg-purple-700 hover:bg-purple-800 rounded flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Siswi</span>
            </a>
        </div>
    </div>

    <!-- Multi-Criteria Dropdown Filter Panel -->
    <div class="bg-white p-4 border border-slate-200 rounded-lg shadow-sm">
        <form method="GET" action="{{ route('admin.siswa.index') }}" class="space-y-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
                
                <!-- 1. Search Box -->
                <div class="lg:col-span-2 relative">
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Pencarian Siswi</label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari nama siswi, NIS, alamat..." 
                            class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 pl-8 pr-3"
                        >
                        <svg class="w-4 h-4 text-slate-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <!-- 2. Dropdown Filter Jurusan -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Filter Jurusan</label>
                    <select name="jurusan" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        <option value="all">Semua Jurusan</option>
                        <option value="SMP" {{ request('jurusan') === 'SMP' ? 'selected' : '' }}>SMP (Seni Musik Digital & DTM)</option>
                        <option value="FAR" {{ request('jurusan') === 'FAR' ? 'selected' : '' }}>FAR (Sains Bio-Farmasi)</option>
                        <option value="DKV" {{ request('jurusan') === 'DKV' ? 'selected' : '' }}>DKV (Desain Visual)</option>
                        <option value="RPL" {{ request('jurusan') === 'RPL' ? 'selected' : '' }}>RPL (Rekayasa Software)</option>
                        <option value="MBM" {{ request('jurusan') === 'MBM' ? 'selected' : '' }}>MBM (Bisnis Media)</option>
                    </select>
                </div>

                <!-- 3. Dropdown Filter Tingkat Kelas -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Tingkat Kelas</label>
                    <select name="tingkat" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        <option value="all">Semua Tingkat</option>
                        <option value="X" {{ request('tingkat') === 'X' ? 'selected' : '' }}>Kelas X (Tingkat 1)</option>
                        <option value="XI" {{ request('tingkat') === 'XI' ? 'selected' : '' }}>Kelas XI (Tingkat 2)</option>
                        <option value="XII" {{ request('tingkat') === 'XII' ? 'selected' : '' }}>Kelas XII (Tingkat 3)</option>
                    </select>
                </div>

                <!-- 4. Filter Rombel Spesifik -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Rombel Kelas</label>
                    <select name="kelas" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        <option value="all">Semua Rombel</option>
                        @foreach ($kelasList ?? [] as $k)
                            <option value="{{ $k }}" {{ request('kelas') === $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Action Buttons for Filter -->
            <div class="flex items-center justify-between pt-2 border-t border-slate-100">
                <div class="text-xs text-slate-500">
                    Gunakan filter untuk meninjau data per angkatan atau program keahlian.
                </div>
                <div class="flex items-center gap-2">
                    @if(request('search') || (request('jurusan') && request('jurusan') !== 'all') || (request('tingkat') && request('tingkat') !== 'all') || (request('kelas') && request('kelas') !== 'all'))
                        <a href="{{ route('admin.siswa.index') }}" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded text-xs font-semibold">
                            Reset Filter
                        </a>
                    @endif
                    <button type="submit" class="px-4 py-1.5 bg-purple-700 hover:bg-purple-800 text-white rounded text-xs font-bold transition-colors shadow-sm">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Master Data Siswi -->
    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase tracking-wider">
                        <th class="py-3 px-4 border-r border-slate-200">NIS</th>
                        <th class="py-3 px-4 border-r border-slate-200">Nama Lengkap Siswi</th>
                        <th class="py-3 px-4 border-r border-slate-200">Kelas / Jurusan</th>
                        <th class="py-3 px-4 border-r border-slate-200 text-center">L/P</th>
                        <th class="py-3 px-4 border-r border-slate-200">Domisili</th>
                        <th class="py-3 px-4 border-r border-slate-200 text-center">Data Nilai</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($siswas as $siswa)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-2.5 px-4 font-mono font-semibold text-slate-600 border-r border-slate-100">
                                {{ $siswa->nis }}
                            </td>
                            <td class="py-2.5 px-4 border-r border-slate-100 font-bold text-slate-900">
                                <div class="flex items-center gap-2">
                                    <x-avatar :user="$siswa->user" size="sm" />
                                    <span>{{ $siswa->nama }}</span>
                                </div>
                            </td>
                            <td class="py-2.5 px-4 font-semibold text-slate-700 border-r border-slate-100">
                                <span class="inline-block px-1.5 py-0.5 rounded bg-purple-50 text-purple-700 border border-purple-200 text-[11px] font-mono">
                                    {{ $siswa->kelas }}
                                </span>
                            </td>
                            <td class="py-2.5 px-4 text-center border-r border-slate-100">
                                <span class="inline-block px-1.5 py-0.5 text-[10px] font-semibold rounded bg-purple-50 text-purple-700 border border-purple-200">
                                    {{ $siswa->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="py-2.5 px-4 text-slate-600 border-r border-slate-100">
                                {{ $siswa->alamat }}
                            </td>
                            <td class="py-2.5 px-4 text-center border-r border-slate-100">
                                <span class="text-purple-700 font-bold">{{ $siswa->nilais->count() }}</span> Record
                            </td>
                            <td class="py-2.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('admin.siswa.show', $siswa) }}" class="px-2 py-1 text-[11px] font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded border border-slate-300 transition-colors">
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.siswa.edit', $siswa) }}" class="px-2 py-1 text-[11px] font-semibold text-purple-700 bg-purple-50 hover:bg-purple-100 rounded border border-purple-200 transition-colors">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">Tidak ada data siswi yang cocok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Bar -->
        <div class="p-4 border-t border-slate-200 bg-slate-50">
            {{ $siswas->links() }}
        </div>
    </div>

</div>
@endsection
