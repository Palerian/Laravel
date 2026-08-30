<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return "Daftar Guru";
    }

    public function create()
    {
        return "Form Tambah Guru";
    }

    public function edit($id)
    {
        return "Form Edit Guru";
    }

    public function store(Request $request)
    {
        return $request->nama;
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return $guru ? $guru->nama : "Guru tidak ditemukan";
    }

    public function update(Request $request, $id)
    {
        return "Update guru ID: " . $id;
    }

    public function destroy($id)
    {
        return "Hapus guru ID: " . $id;
    }

    public function api()
    {
        $gurus = Guru::with('user')->latest()->take(10)->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => $gurus->map(function ($guru) {
                return [
                    'id' => $guru->id,
                    'nama' => $guru->nama,
                    'nip' => $guru->nip,
                    'mata_pelajaran' => $guru->mata_pelajaran,
                    'no_telepon' => $guru->no_telepon,
                    'email' => $guru->user ? $guru->user->email : null,
                    'jabatan' => $guru->user ? $guru->user->jabatan : null,
                ];
            })->toArray()
        ]);
    }

    public function simpan()
    {
        return redirect('/guru')
            ->with('success', 'Data berhasil disimpan');
    }
}