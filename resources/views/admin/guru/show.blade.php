@extends('layouts.admin')

@section('title', 'Detail Guru — ' . $guru->nama)
@section('heading', 'Detail Data Pendidik')

@section('content')
<div class="max-w-xl space-y-5">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="flex items-center gap-4 border-b border-slate-200 pb-4">
            <x-avatar :user="$guru->user" size="lg" />
            <div>
                <h2 class="text-lg font-bold text-slate-900 leading-tight">{{ $guru->nama }}</h2>
                <p class="text-xs text-purple-700 font-semibold">{{ $guru->mata_pelajaran }}</p>
                <p class="text-[11px] text-slate-500 font-mono">NIP: {{ $guru->nip }}</p>
            </div>
        </div>

        <div class="space-y-2.5 text-xs text-slate-700">
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Mata Pelajaran:</span>
                <span class="font-bold text-slate-900">{{ $guru->mata_pelajaran }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Jenis Kelamin:</span>
                <span class="font-semibold">{{ $guru->jenis_kelamin === 'P' ? 'Perempuan' : 'Laki-laki' }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">No. Telepon:</span>
                <span class="font-mono">{{ $guru->no_telepon ?? '-' }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Alamat Domisili:</span>
                <span>{{ $guru->alamat ?? '-' }}</span>
            </div>
            <div class="flex justify-between py-1">
                <span class="text-slate-500">Status Akun SIA:</span>
                <span class="{{ $guru->user ? 'text-emerald-700 font-bold' : 'text-slate-400' }}">
                    {{ $guru->user ? 'Terhubung (' . $guru->user->email . ')' : 'Belum Ditautkan' }}
                </span>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.guru.edit', $guru) }}" class="px-3.5 py-1.5 bg-purple-700 hover:bg-purple-800 text-white text-xs font-bold rounded transition-colors shadow-sm">
                    Edit Data Guru
                </a>
                <a href="{{ route('admin.guru.index') }}" class="px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Kembali
                </a>
            </div>
            <form method="POST" action="{{ route('admin.guru.destroy', $guru) }}" onsubmit="return confirm('Hapus data guru ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-xs text-rose-600 hover:bg-rose-50 rounded transition-colors font-semibold">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
