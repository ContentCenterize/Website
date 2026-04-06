<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_index_returns_200_and_xml()
    {
        $response = $this->get('/sitemap');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
    }

    public function test_sitemap_posts_returns_200_and_xml()
    {
        // Create some posts to ensure the sitemap has data
        Post::factory()->count(3)->create(['hide' => false]);

        $response = $this->get('/sitemap/posts');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
    }
}
