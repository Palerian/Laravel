@extends('layouts.admin')

@section('title', 'Edit Mata Pelajaran — SMK Miyamasuzaka')
@section('heading', 'Sunting Mata Pelajaran')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="border-b border-slate-200 pb-3">
            <h2 class="text-base font-bold text-slate-900">Perbarui Mapel: {{ $mapel->nama }}</h2>
            <p class="text-xs text-slate-500 mt-0.5">Kode: {{ $mapel->kode }}</p>
        </div>

        <form method="POST" action="{{ route('admin.mapel.update', $mapel) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="kode" class="block text-xs font-semibold text-slate-700 mb-1">Kode Mapel</label>
                <input type="text" id="kode" name="kode" value="{{ old('kode', $mapel->kode) }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                <x-input-error :messages="$errors->get('kode')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-1">Nama Mata Pelajaran</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $mapel->nama) }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                <x-input-error :messages="$errors->get('nama')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div>
                <label for="guru_id" class="block text-xs font-semibold text-slate-700 mb-1">Guru Pengampu</label>
                <select id="guru_id" name="guru_id" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('guru_id', $mapel->guru_id) == $guru->id ? 'selected' : '' }}>
                            {{ $guru->nama }} ({{ $guru->mata_pelajaran }})
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('guru_id')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.mapel.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
