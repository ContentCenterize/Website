<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_requires_authentication()
    {
        $response = $this->get(route('category.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_index_requires_permission()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('category.index'));

        $response->assertStatus(403);
    }

    public function test_index_displays_view_with_permission()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'edit_category']);
        $user->givePermissionTo('edit_category');

        $response = $this->actingAs($user)
            ->get(route('category.index'));

        $response->assertStatus(200);
        $response->assertViewIs('category.index');
    }

    public function test_create_requires_permission()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('category.create'));

        $response->assertStatus(403);
    }

    public function test_create_displays_view_with_permission()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'edit_category']);
        $user->givePermissionTo('edit_category');

        $response = $this->actingAs($user)
            ->get(route('category.create'));

        $response->assertStatus(200);
        $response->assertViewIs('category.add');
    }
}
