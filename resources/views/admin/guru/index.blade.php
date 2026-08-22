@extends('layouts.admin')

@section('title', 'Data Guru — SMK Miyamasuzaka')
@section('heading', 'Data Tenaga Pendidik (45 Guru)')

@section('content')
<div class="space-y-5">

    <!-- Header Action & Filter Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-3 border-b border-slate-200">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">Database Guru SMK Miyamasuzaka</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Kelola data 45 tenaga pendidik kejuruan, mata pelajaran yang diampu, dan nomor induk pegawai.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center px-3 py-1.5 rounded text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                Total: {{ $gurus->total() }} Guru
            </span>
            <a href="{{ route('admin.guru.create') }}" class="px-3.5 py-1.5 text-xs font-semibold text-white bg-purple-700 hover:bg-purple-800 rounded flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Guru</span>
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white p-4 border border-slate-200 rounded-lg shadow-sm">
        <form method="GET" action="{{ route('admin.guru.index') }}" class="flex flex-col sm:flex-row sm:items-center gap-3">
            <div class="flex-1 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari berdasarkan nama guru, NIP, atau mata pelajaran..." 
                    class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 pl-9 pr-3"
                >
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="px-4 py-2 text-xs font-semibold text-white bg-purple-700 hover:bg-purple-800 rounded transition-colors shadow-sm">
                    Cari Guru
                </button>

                @if(request('search'))
                    <a href="{{ route('admin.guru.index') }}" class="px-3 py-2 text-xs font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Guru -->
    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase tracking-wider">
                        <th class="py-3 px-4">Nama Guru & Gelar</th>
                        <th class="py-3 px-4">NIP</th>
                        <th class="py-3 px-4">Mata Pelajaran Utama</th>
                        <th class="py-3 px-4">No. Telepon</th>
                        <th class="py-3 px-4 text-center">Status Akun</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($gurus as $guru)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-4 font-bold text-slate-900">
                                <div class="flex items-center gap-3">
                                    <x-avatar :user="$guru->user" size="sm" />
                                    <span>{{ $guru->nama }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 font-mono font-semibold text-slate-600">{{ $guru->nip }}</td>
                            <td class="py-3 px-4">
                                <span class="inline-block px-2 py-0.5 rounded text-[11px] font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                                    {{ $guru->mata_pelajaran }}
                                </span>
                            </td>
                            <td class="py-3 px-4 font-mono text-slate-500">{{ $guru->no_telepon ?? '-' }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($guru->user)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-500">
                                        Belum Ditautkan
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.guru.show', $guru) }}" class="px-2.5 py-1 text-slate-700 hover:bg-slate-100 border border-slate-300 rounded font-semibold transition-colors">
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.guru.edit', $guru) }}" class="px-2.5 py-1 text-purple-700 hover:bg-purple-50 border border-purple-200 rounded font-semibold transition-colors">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">Tidak ada data guru yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200 bg-slate-50">
            {{ $gurus->links() }}
        </div>
    </div>

</div>
@endsection
