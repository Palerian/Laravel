@extends('layouts.admin')

@section('title', 'Input Nilai Siswi — SMK Miyamasuzaka')
@section('heading', 'Input Nilai Evaluasi')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="border-b border-slate-200 pb-3">
            <h2 class="text-base font-bold text-slate-900">Form Input Nilai Siswi</h2>
            <p class="text-xs text-slate-500 mt-0.5">Catat hasil penilaian akademik atau evaluasi kejuruan.</p>
        </div>

        <form method="POST" action="{{ route('admin.nilai.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="siswa_id" class="block text-xs font-semibold text-slate-700 mb-1">Siswi</label>
                <select id="siswa_id" name="siswa_id" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                    <option value="">-- Pilih Siswi --</option>
                    @foreach ($siswas as $s)
                        <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }} (NIS: {{ $s->nis }} • Kelas: {{ $s->kelas }})
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('siswa_id')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div>
                <label for="mapel_id" class="block text-xs font-semibold text-slate-700 mb-1">Mata Pelajaran</label>
                <select id="mapel_id" name="mapel_id" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($mapels as $m)
                        <option value="{{ $m->id }}" {{ old('mapel_id') == $m->id ? 'selected' : '' }}>
                            {{ $m->nama }} ({{ $m->kode }})
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('mapel_id')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="jenis_nilai" class="block text-xs font-semibold text-slate-700 mb-1">Jenis Evaluasi</label>
                    <select id="jenis_nilai" name="jenis_nilai" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        @foreach (['Tugas', 'UH', 'UTS', 'UAS', 'Praktik Kejuruan'] as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_nilai') === $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="nilai" class="block text-xs font-semibold text-slate-700 mb-1">Nilai Angka (0 - 100)</label>
                    <input type="number" id="nilai" name="nilai" value="{{ old('nilai', 85) }}" min="0" max="100" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                    <x-input-error :messages="$errors->get('nilai')" class="mt-1 text-xs text-rose-600" />
                </div>
            </div>

            <div class="pt-3 border-t border-slate-200 flex items-center gap-2">
                <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                    Simpan Nilai
                </button>
                <a href="{{ route('admin.nilai.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
