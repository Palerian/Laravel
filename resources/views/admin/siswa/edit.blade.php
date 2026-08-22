@extends('layouts.admin')

@section('title', 'Edit Data Siswi — SMK Miyamasuzaka')
@section('heading', 'Sunting Biodata Siswi')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="border-b border-slate-200 pb-3">
            <h2 class="text-base font-bold text-slate-900">Perbarui Biodata Siswi: {{ $siswa->nama }}</h2>
            <p class="text-xs text-slate-500 mt-0.5">NIS: {{ $siswa->nis }} • Kelas: {{ $siswa->kelas }}</p>
        </div>

        <form method="POST" action="{{ route('admin.siswa.update', $siswa) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap Siswi</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                <x-input-error :messages="$errors->get('nama')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="nis" class="block text-xs font-semibold text-slate-700 mb-1">Nomor Induk Siswa (NIS)</label>
                    <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                    <x-input-error :messages="$errors->get('nis')" class="mt-1 text-xs text-rose-600" />
                </div>

                <div>
                    <label for="kelas" class="block text-xs font-semibold text-slate-700 mb-1">Rombel Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                    <x-input-error :messages="$errors->get('kelas')" class="mt-1 text-xs text-rose-600" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="jenis_kelamin" class="block text-xs font-semibold text-slate-700 mb-1">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                        <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                    </select>
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir?->format('Y-m-d')) }}" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                </div>
            </div>

            <div>
                <label for="alamat" class="block text-xs font-semibold text-slate-700 mb-1">Alamat Domisili</label>
                <textarea id="alamat" name="alamat" rows="2" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">{{ old('alamat', $siswa->alamat) }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.siswa.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
