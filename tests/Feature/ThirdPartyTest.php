<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThirdPartyTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_requires_authentication()
    {
        $response = $this->get(route('third-parties.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_index_displays_view()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('third-parties.index'));

        $response->assertStatus(200);
        $response->assertViewIs('third-party.index');
    }

    public function test_create_requires_authentication()
    {
        $response = $this->get(route('third-parties.create'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_create_displays_view()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('third-parties.create'));

        $response->assertStatus(200);
        $response->assertViewIs('third-party.add');
    }
}
