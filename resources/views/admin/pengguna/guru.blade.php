@extends('layouts.admin')

@section('title', 'Pengguna Guru — SMK Miyamasuzaka')
@section('heading', 'Pengguna Guru')
@section('subheading', 'Akun guru yang terdaftar di sistem SIA.')

@section('content')
    <div class="mb-5 flex flex-wrap gap-2 border-b border-slate-200 pb-3">
        <a href="{{ route('admin.pengguna.guru') }}" class="border border-purple-700 bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-700 rounded">Guru</a>
        <a href="{{ route('admin.pengguna.murid') }}" class="border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-purple-700 hover:text-purple-700 rounded">Siswi</a>
    </div>

    <p class="mb-4 text-xs text-slate-500">{{ $users->total() }} akun guru terdaftar</p>

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold uppercase">
                    <th class="px-4 py-3">Avatar</th>
                    <th class="px-4 py-3">Nama Lengkap</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">NIP</th>
                    <th class="px-4 py-3">Mapel</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3"><x-avatar :user="$user" size="sm" /></td>
                        <td class="px-4 py-3 font-bold text-slate-900">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                        <td class="px-4 py-3 font-mono">{{ $user->guru?->nip ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $user->guru?->mata_pelajaran ?? '—' }}</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('profile.show', $user->id) }}" class="text-purple-700 font-bold hover:underline">Lihat profil</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-slate-400">Belum ada akun guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>
@endsection
