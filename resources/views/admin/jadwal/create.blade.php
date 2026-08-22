@extends('layouts.admin')

@section('title', 'Tambah Jadwal Pelajaran — SMK Miyamasuzaka')
@section('heading', 'Alokasi Jadwal Pelajaran')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="border-b border-slate-200 pb-3">
            <h2 class="text-base font-bold text-slate-900">Form Tambah Jadwal Pelajaran</h2>
            <p class="text-xs text-slate-500 mt-0.5">Alokasikan mata pelajaran ke rombel kelas dan jadwal hari.</p>
        </div>

        <form method="POST" action="{{ route('admin.jadwal.store') }}" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="hari" class="block text-xs font-semibold text-slate-700 mb-1">Hari</label>
                    <select id="hari" name="hari" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                            <option value="{{ $hari }}" {{ old('hari') === $hari ? 'selected' : '' }}>{{ $hari }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="kelas" class="block text-xs font-semibold text-slate-700 mb-1">Rombel Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: X-SMP-1 / XI-FAR-1" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                    <x-input-error :messages="$errors->get('kelas')" class="mt-1 text-xs text-rose-600" />
                </div>
            </div>

            <div>
                <label for="mapel_id" class="block text-xs font-semibold text-slate-700 mb-1">Mata Pelajaran</label>
                <select id="mapel_id" name="mapel_id" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                            {{ $mapel->nama }} ({{ $mapel->guru->nama ?? 'Guru' }})
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('mapel_id')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="jam_mulai" class="block text-xs font-semibold text-slate-700 mb-1">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai', '08:00') }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                </div>

                <div>
                    <label for="jam_selesai" class="block text-xs font-semibold text-slate-700 mb-1">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai', '09:30') }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                </div>
            </div>

            <div class="pt-3 border-t border-slate-200 flex items-center gap-2">
                <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                    Simpan Jadwal
                </button>
                <a href="{{ route('admin.jadwal.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
