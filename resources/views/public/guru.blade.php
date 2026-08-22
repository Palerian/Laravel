@extends('layouts.public')

@section('title', 'Direktori Tenaga Pendidik — SMK Miyamasuzaka')
@section('page_heading', 'Direktori Tenaga Pendidik')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-6">

    <div class="bg-white border border-slate-200 rounded-lg p-4 sm:p-5 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <form method="GET" action="{{ route('public.guru') }}" class="flex items-center gap-2 flex-1 max-w-md">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari nama guru atau mata pelajaran..." 
                class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 text-slate-800"
            >
            <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm shrink-0">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('public.guru') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded transition-colors shrink-0">
                    Reset
                </a>
            @endif
        </form>
        <span class="text-xs text-slate-500 font-medium shrink-0">
            Total Pengajar: <strong>{{ $gurus->total() }}</strong> Guru
        </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse ($gurus as $g)
            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm flex flex-col justify-between space-y-3 hover:border-purple-300 transition-colors">
                <div class="flex items-center gap-3">
                    <x-avatar :user="$g->user" size="lg" />
                    <div class="min-w-0 flex-1">
                        <h3 class="text-xs font-bold text-slate-900 truncate">{{ $g->nama }}</h3>
                        <span class="text-[10px] text-purple-700 font-semibold block truncate">{{ $g->mata_pelajaran }}</span>
                    </div>
                </div>

                <div class="space-y-1 text-[11px] text-slate-500 border-t border-slate-100 pt-2.5">
                    <div class="flex justify-between">
                        <span>NIP:</span>
                        <span class="font-mono text-slate-700 font-medium">{{ $g->nip }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Status:</span>
                        <span class="text-emerald-700 font-bold">Aktif Mengajar</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-xs text-slate-500 bg-white border border-slate-200 rounded-lg">
                Tidak ditemukan data tenaga pendidik dengan kata kunci tersebut.
            </div>
        @endforelse
    </div>

    <div class="pt-2">
        {{ $gurus->links() }}
    </div>

</div>
@endsection
