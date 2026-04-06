<?php

namespace Tests\Feature;

use App\Models\ThirdParty;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThirdPartyValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_requires_authentication()
    {
        $thirdParty = ThirdParty::factory()->create();

        $response = $this->get(route('third-party-validation.show', $thirdParty));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_show_displays_view_when_user_owns_third_party()
    {
        $user = User::factory()->create();
        $thirdParty = ThirdParty::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('third-party-validation.show', $thirdParty));

        $response->assertStatus(200);
        $response->assertViewIs('third-party.validation.show');
        $response->assertViewHas('thirdParty', $thirdParty);
    }

    public function test_show_returns_403_when_user_does_not_own_third_party()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $thirdParty = ThirdParty::factory()->create(['user_id' => $user1->id]);

        $response = $this->actingAs($user2)
            ->get(route('third-party-validation.show', $thirdParty));

        $response->assertStatus(403);
    }
}
