@extends('layouts.admin')

@section('title', 'Detail Siswi — ' . $siswa->nama)
@section('heading', 'Detail Data Siswi')

@section('content')
<div class="max-w-xl space-y-5">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="flex items-center gap-4 border-b border-slate-200 pb-4">
            <x-avatar :user="$siswa->user" size="lg" />
            <div>
                <h2 class="text-lg font-bold text-slate-900 leading-tight">{{ $siswa->nama }}</h2>
                <p class="text-xs text-purple-700 font-semibold font-mono">Kelas {{ $siswa->kelas }}</p>
                <p class="text-[11px] text-slate-500 font-mono">NIS: {{ $siswa->nis }}</p>
            </div>
        </div>

        <div class="space-y-2.5 text-xs text-slate-700">
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Jenis Kelamin:</span>
                <span class="font-semibold">{{ $siswa->jenis_kelamin === 'P' ? 'Perempuan' : 'Laki-laki' }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Tanggal Lahir:</span>
                <span>{{ $siswa->tanggal_lahir?->format('d F Y') ?? '-' }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Domisili:</span>
                <span>{{ $siswa->alamat ?? '-' }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
                <span class="text-slate-500">Status Akun SIA:</span>
                <span class="{{ $siswa->user ? 'text-emerald-700 font-bold' : 'text-slate-400' }}">
                    {{ $siswa->user ? 'Terhubung (' . $siswa->user->email . ')' : 'Belum Ditautkan' }}
                </span>
            </div>
            <div class="flex justify-between py-1">
                <span class="text-slate-500">Total Evaluasi Nilai:</span>
                <span class="font-bold text-purple-700">{{ $siswa->nilais->count() }} Record</span>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.siswa.edit', $siswa) }}" class="px-3.5 py-1.5 bg-purple-700 hover:bg-purple-800 text-white text-xs font-bold rounded transition-colors shadow-sm">
                    Edit Data Siswi
                </a>
                <a href="{{ route('admin.siswa.index') }}" class="px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Kembali
                </a>
            </div>
            <form method="POST" action="{{ route('admin.siswa.destroy', $siswa) }}" onsubmit="return confirm('Hapus data siswi ini?')">
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
