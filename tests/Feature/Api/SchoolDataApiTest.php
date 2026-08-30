<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolDataApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_catalog_is_available(): void
    {
        $response = $this->getJson('/api');

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonStructure(['endpoints' => ['guru', 'mapel', 'jadwal', 'agenda', 'pengumuman']]);
    }

    public function test_public_school_endpoints_return_json(): void
    {
        foreach (['guru', 'mapel', 'jadwal', 'agenda', 'pengumuman'] as $endpoint) {
            $this->getJson('/api/'.$endpoint)
                ->assertOk()
                ->assertJsonStructure(['success', 'message', 'data', 'meta']);
        }
    }

    public function test_can_create_guru_through_api(): void
    {
        $response = $this->postJson('/api/guru/store', [
            'nama' => 'Guru API',
            'nip' => 'API-001',
            'mata_pelajaran' => 'Pemrograman Web',
            'no_telepon' => '081234567890',
            'email' => 'guru.api@example.com',
            'password' => 'password123',
        ]);

        $response->assertCreated()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.nama', 'Guru API')
            ->assertJsonPath('data.user.role', 'guru');

        $this->assertDatabaseHas('gurus', ['nip' => 'API-001']);
        $this->assertDatabaseHas('users', ['email' => 'guru.api@example.com', 'role' => 'guru']);
    }

    public function test_create_guru_validates_required_fields(): void
    {
        $this->postJson('/api/guru', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nama', 'nip', 'mata_pelajaran', 'no_telepon']);
    }
}
