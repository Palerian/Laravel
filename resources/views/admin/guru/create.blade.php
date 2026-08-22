@extends('layouts.admin')

@section('title', 'Tambah Guru Baru — SMK Miyamasuzaka')
@section('heading', 'Pendaftaran Tenaga Pendidik')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm space-y-5">
        <div class="border-b border-slate-200 pb-3">
            <h2 class="text-base font-bold text-slate-900">Form Pendaftaran Guru Baru</h2>
            <p class="text-xs text-slate-500 mt-0.5">Tambahkan data tenaga pengajar SMK Miyamasuzaka Girls Academy.</p>
        </div>

        <form method="POST" action="{{ route('admin.guru.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar Pendidik</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                <x-input-error :messages="$errors->get('nama')" class="mt-1 text-xs text-rose-600" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="nip" class="block text-xs font-semibold text-slate-700 mb-1">NIP (Nomor Induk Pegawai)</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                    <x-input-error :messages="$errors->get('nip')" class="mt-1 text-xs text-rose-600" />
                </div>

                <div>
                    <label for="mata_pelajaran" class="block text-xs font-semibold text-slate-700 mb-1">Mata Pelajaran Utama</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}" required class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                    <x-input-error :messages="$errors->get('mata_pelajaran')" class="mt-1 text-xs text-rose-600" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="jenis_kelamin" class="block text-xs font-semibold text-slate-700 mb-1">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">
                        <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                    </select>
                </div>

                <div>
                    <label for="no_telepon" class="block text-xs font-semibold text-slate-700 mb-1">No. Telepon / WhatsApp</label>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 font-mono">
                </div>
            </div>

            <div>
                <label for="alamat" class="block text-xs font-semibold text-slate-700 mb-1">Alamat Domisili</label>
                <textarea id="alamat" name="alamat" rows="2" class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3">{{ old('alamat') }}</textarea>
            </div>

            <div class="pt-3 border-t border-slate-200 flex items-center gap-2">
                <button type="submit" class="px-4 py-2 bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs rounded transition-colors shadow-sm">
                    Simpan Data Guru
                </button>
                <a href="{{ route('admin.guru.index') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold rounded border border-slate-300 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
