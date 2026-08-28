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
}
