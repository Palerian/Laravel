<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGuruRequest;
use App\Http\Requests\Admin\UpdateGuruRequest;
use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class SchoolDataController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'SMK Miyamasuzaka REST API is ready.',
            'endpoints' => [
                'guru' => [
                    'list' => url('/api/guru') . ' (GET)',
                    'detail' => url('/api/guru/{id}') . ' (GET)',
                    'store' => url('/api/guru/store') . ' (POST)',
                    'store_alt' => url('/api/guru') . ' (POST)',
                    'update' => url('/api/guru/{id}') . ' (PUT/POST)',
                    'delete' => url('/api/guru/{id}') . ' (DELETE)',
                ],
                'mapel' => [
                    'list' => url('/api/mapel') . ' (GET)',
                    'detail' => url('/api/mapel/{id}') . ' (GET)',
                ],
                'jadwal' => url('/api/jadwal') . ' (GET)',
                'agenda' => url('/api/agenda') . ' (GET)',
                'pengumuman' => url('/api/pengumuman') . ' (GET)',
            ],
        ]);
    }

    public function guru(Request $request): JsonResponse
    {
        $query = Guru::query()->with(['mataPelajarans', 'user']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('mata_pelajaran', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('all')) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar seluruh guru berhasil diambil.',
                'data' => $query->orderBy('nama')->get(),
            ]);
        }

        $perPage = max(1, min(100, (int) $request->input('per_page', 20)));
        return $this->collectionResponse(
            $query->orderBy('nama')->paginate($perPage),
            'Daftar guru berhasil diambil.'
        );
    }

    public function showGuru($id): JsonResponse
    {
        $guru = Guru::with(['mataPelajarans', 'user'])->find($id);

        if (! $guru) {
            return response()->json([
                'success' => false,
                'message' => "Data guru dengan ID {$id} tidak ditemukan.",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data guru berhasil diambil.',
            'data' => $guru,
        ]);
    }

    public function storeGuru(StoreGuruRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $guru = DB::transaction(function () use ($validated) {
                $userId = null;

                if (! empty($validated['email'])) {
                    $user = User::create([
                        'name' => $validated['nama'],
                        'email' => $validated['email'],
                        'password' => Hash::make($validated['password'] ?? 'password123'),
                        'role' => User::ROLE_GURU,
                    ]);
                    $userId = $user->id;
                }

                return Guru::create([
                    'user_id' => $userId,
                    'nama' => $validated['nama'],
                    'nip' => $validated['nip'],
                    'mata_pelajaran' => $validated['mata_pelajaran'],
                    'no_telepon' => $validated['no_telepon'],
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Data guru berhasil ditambahkan.',
                'data' => $guru->load('user'),
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateGuru(UpdateGuruRequest $request, $id): JsonResponse
    {
        $guru = Guru::find($id);

        if (! $guru) {
            return response()->json([
                'success' => false,
                'message' => "Data guru dengan ID {$id} tidak ditemukan.",
            ], 404);
        }

        $validated = $request->validated();

        try {
            DB::transaction(function () use ($guru, $validated) {
                if (! empty($validated['email'])) {
                    if ($guru->user) {
                        $userData = [
                            'name' => $validated['nama'],
                            'email' => $validated['email'],
                        ];
                        if (! empty($validated['password'])) {
                            $userData['password'] = Hash::make($validated['password']);
                        }
                        $guru->user->update($userData);
                    } else {
                        $user = User::create([
                            'name' => $validated['nama'],
                            'email' => $validated['email'],
                            'password' => Hash::make($validated['password'] ?? 'password123'),
                            'role' => User::ROLE_GURU,
                        ]);
                        $guru->user_id = $user->id;
                    }
                }

                $guru->update([
                    'user_id' => $guru->user_id,
                    'nama' => $validated['nama'],
                    'nip' => $validated['nip'],
                    'mata_pelajaran' => $validated['mata_pelajaran'],
                    'no_telepon' => $validated['no_telepon'],
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Data guru berhasil diperbarui.',
                'data' => $guru->fresh()->load('user'),
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroyGuru($id): JsonResponse
    {
        $guru = Guru::find($id);

        if (! $guru) {
            return response()->json([
                'success' => false,
                'message' => "Data guru dengan ID {$id} tidak ditemukan.",
            ], 404);
        }

        try {
            DB::transaction(function () use ($guru) {
                if ($guru->user) {
                    $guru->user->delete();
                }
                $guru->delete();
            });

            return response()->json([
                'success' => true,
                'message' => 'Data guru berhasil dihapus.',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function mapel(Request $request): JsonResponse
    {
        $query = MataPelajaran::query()->with('guru');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('kode', 'like', "%{$search}%");
        }

        if ($request->boolean('all')) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar seluruh mata pelajaran berhasil diambil.',
                'data' => $query->orderBy('nama')->get(),
            ]);
        }

        $perPage = max(1, min(100, (int) $request->input('per_page', 20)));
        return $this->collectionResponse(
            $query->orderBy('nama')->paginate($perPage),
            'Daftar mata pelajaran berhasil diambil.'
        );
    }

    public function showMapel($id): JsonResponse
    {
        $mapel = MataPelajaran::with('guru')->find($id);

        if (! $mapel) {
            return response()->json([
                'success' => false,
                'message' => "Mata pelajaran dengan ID {$id} tidak ditemukan.",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail mata pelajaran berhasil diambil.',
            'data' => $mapel,
        ]);
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

        if ($request->boolean('all')) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar seluruh jadwal berhasil diambil.',
                'data' => $query->get(),
            ]);
        }

        $perPage = max(1, min(100, (int) $request->input('per_page', 20)));
        return $this->collectionResponse($query->paginate($perPage), 'Jadwal berhasil diambil.');
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