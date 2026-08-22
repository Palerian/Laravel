@php
    $layout = match (true) {
        Auth::user()->isGuru() => 'layouts.guru',
        Auth::user()->isMurid() => 'layouts.murid',
        default => 'layouts.admin',
    };
@endphp
@extends($layout)

@section('title', 'Profil Pengguna — SMK Miyamasuzaka Girls Academy')
@section('heading', $isOwner ? 'Profil Akun Saya' : 'Profil Pengguna')

@section('content')
    @php
        $backUrl = match (true) {
            Auth::user()->isGuru() => route('guru.dashboard'),
            Auth::user()->isMurid() => route('murid.dashboard'),
            default => route('dashboard'),
        };
    @endphp

    <div class="grid gap-6 lg:grid-cols-12">
        <!-- Panel Kiri: Informasi Akun (5 Cols) -->
        <section class="lg:col-span-5 bg-white border border-slate-200 rounded-lg p-5 sm:p-6 shadow-sm space-y-6">
            <div class="flex flex-col items-center text-center pb-4 border-b border-slate-200">
                <div class="mb-3">
                    <x-avatar :user="$user" size="xl" />
                </div>
                <h2 class="text-lg font-bold text-slate-900 leading-tight">{{ $user->name }}</h2>
                <p class="text-xs text-slate-500 mt-0.5">{{ $user->email }}</p>
                <div class="mt-2">
                    <span class="inline-block px-2.5 py-0.5 rounded text-xs font-semibold {{ $user->isAdmin() ? 'bg-purple-100 text-purple-700 border border-purple-300' : ($user->isGuru() ? 'bg-slate-100 text-slate-700 border border-slate-200' : 'bg-purple-50 text-purple-700 border border-purple-200') }}">
                        Peran: {{ strtoupper($user->role) }}
                    </span>
                </div>
            </div>

            @if ($user->guru)
                <div class="space-y-2 text-xs border-b border-slate-200 pb-4">
                    <h3 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] mb-2 text-purple-700">Data Tenaga Pengajar</h3>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">NIP:</span>
                        <span class="font-mono font-semibold text-slate-800">{{ $user->guru->nip }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">Mapel Utama:</span>
                        <span class="font-semibold text-slate-800">{{ $user->guru->mata_pelajaran }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-slate-500">No. Telepon:</span>
                        <span class="font-mono text-slate-800">{{ $user->guru->no_telepon }}</span>
                    </div>
                </div>
            @endif

            @if ($user->siswa)
                <div class="space-y-2 text-xs border-b border-slate-200 pb-4">
                    <h3 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] mb-2 text-purple-700">Data Akademik Siswi</h3>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">NIS Siswi:</span>
                        <span class="font-mono font-semibold text-slate-800">{{ $user->siswa->nis }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">Kelas Rombel:</span>
                        <span class="font-semibold text-slate-800">{{ $user->siswa->kelas }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">Jenis Kelamin:</span>
                        <span class="font-semibold text-slate-800">{{ $user->siswa->jenis_kelamin === 'P' ? 'Perempuan' : 'Laki-laki' }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span class="text-slate-500">Domisili:</span>
                        <span class="text-slate-800">{{ $user->siswa->alamat }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-slate-500">Total Penilaian:</span>
                        <span class="font-bold text-purple-700">{{ $user->siswa->nilais->count() }} Record</span>
                    </div>
                </div>
            @endif

            <div class="text-xs text-slate-500">
                <span class="font-semibold text-slate-700">Status Akun:</span> Terverifikasi • SIA SMK Miyamasuzaka T.A. 2026/2027
            </div>
        </section>

        <!-- Panel Kanan: Form Edit Nama / Profil (7 Cols) -->
        <section class="lg:col-span-7 bg-white border border-slate-200 rounded-lg p-5 sm:p-6 shadow-sm">
            @if ($canEdit)
                <div class="border-b border-slate-200 pb-3 mb-5">
                    <h2 class="text-base font-bold text-slate-900">Pengaturan Informasi Akun</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Perbarui nama pengguna akun SIA Anda.</p>
                </div>

                <form method="POST" action="{{ route('profile.update.user', $user->id) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name', $user->name) }}" 
                            required 
                            class="w-full text-xs rounded border-slate-300 focus:border-purple-700 focus:ring-purple-700 py-2 px-3 text-slate-900"
                        >
                        @error('name')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Alamat Email (Akun)</label>
                        <input 
                            type="text" 
                            disabled 
                            value="{{ $user->email }}" 
                            class="w-full text-xs rounded border-slate-200 bg-slate-50 py-2 px-3 text-slate-500 cursor-not-allowed"
                        >
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-3 pt-2 border-t border-slate-200">
                        <button type="submit" class="px-5 py-2 bg-purple-700 hover:bg-purple-800 text-white font-semibold text-xs rounded transition-colors shadow-sm">
                            Simpan Perubahan
                        </button>
                        <a href="{{ $backUrl }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-xs rounded border border-slate-300 transition-colors">
                            Kembali
                        </a>
                    </div>
                </form>
            @else
                <div class="border-b border-slate-200 pb-3 mb-4">
                    <h2 class="text-base font-bold text-slate-900">Rincian Akademik</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Informasi akun pengguna.</p>
                </div>

                @if ($user->siswa && $user->siswa->nilais->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase">
                                    <th class="py-2.5 px-3">Mata Pelajaran</th>
                                    <th class="py-2.5 px-3">Evaluasi</th>
                                    <th class="py-2.5 px-3 text-right">Nilai Angka</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($user->siswa->nilais->take(10) as $nilai)
                                    <tr>
                                        <td class="py-2.5 px-3 font-medium text-slate-900">{{ $nilai->mapel?->nama ?? '—' }}</td>
                                        <td class="py-2.5 px-3 text-slate-600">{{ $nilai->jenis_nilai }}</td>
                                        <td class="py-2.5 px-3 text-right font-mono font-bold text-purple-700">{{ $nilai->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-xs text-slate-500 py-6 text-center">Tidak ada catatan nilai tambahan.</p>
                @endif

                <div class="mt-6 pt-4 border-t border-slate-200">
                    <a href="{{ $backUrl }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded border border-slate-300 inline-block">
                        Kembali
                    </a>
                </div>
            @endif
        </section>
    </div>
@endsection
