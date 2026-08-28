<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Pengumuman;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolDataController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'School API is ready.',
            'endpoints' => [
                'guru' => url('/api/guru'),
                'mapel' => url('/api/mapel'),
                'jadwal' => url('/api/jadwal'),
                'agenda' => url('/api/agenda'),
                'pengumuman' => url('/api/pengumuman'),
            ],
        ]);
    }

    public function guru(): JsonResponse
    {
        return $this->collectionResponse(
            Guru::query()->with('mataPelajarans')->orderBy('nama')->paginate(20),
            'Daftar guru berhasil diambil.'
        );
    }

    public function mapel(): JsonResponse
    {
        return $this->collectionResponse(
            MataPelajaran::query()->with('guru')->orderBy('nama')->paginate(20),
            'Daftar mata pelajaran berhasil diambil.'
        );
    }

    public function jadwal(Request $request): JsonResponse
    {
        $query = Jadwal::query()->with('mapel')->orderBy('hari')->orderBy('jam_mulai');

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->string('kelas')->toString());
        }

        if ($request->filled('hari')) {
            $query->where('hari', $request->string('hari')->toString());
        }

        return $this->collectionResponse($query->paginate(20), 'Jadwal berhasil diambil.');
    }

    public function agenda(): JsonResponse
    {
        return $this->collectionResponse(
            Agenda::query()->latest('tanggal')->paginate(20),
            'Agenda berhasil diambil.'
        );
    }

    public function pengumuman(): JsonResponse
    {
        return $this->collectionResponse(
            Pengumuman::query()->active()->latest()->paginate(20),
            'Pengumuman aktif berhasil diambil.'
        );
    }

    private function collectionResponse($items, string $message): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $items->items(),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
            ],
        ]);
    }
}