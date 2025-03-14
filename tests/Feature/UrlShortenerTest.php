<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ShortenedUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlShortenerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_shorten_url()
    {
        $response = $this->postJson('/shorten', ['url' => 'https://nguyencongquyen.com/']);

        $response->assertStatus(200)
                 ->assertJsonStructure(['shortened_url', 'status']);
    }

    public function test_can_redirect_to_original_url()
    {
        $shortUrl = ShortenedUrl::factory()->create([
            'original_url' => 'https://nguyencongquyen.com/',
            'short_code' => 'abc123',
        ]);

        $response = $this->get('/abc123');

        $response->assertStatus(302)
                 ->assertRedirect('https://nguyencongquyen.com/');
    }

    public function test_redirect_returns_404_if_not_found()
    {
        $response = $this->get('/invalidcode');

        $response->assertStatus(404);
    }
}
