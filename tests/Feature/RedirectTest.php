<?php

/** @noinspection ALL */

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RedirectTest extends TestCase
{
    use RefreshDatabase;

    public function testRedirectToTargetUrl()
    {
        // Create temporary data for testing
        Customer::create([
            'id' => 2,
            'name' => 'Vecna',
        ]);
        Campaign::create([
            'id' => 1,
            'name' => 'TheUpsideDown',
            'customer_id' => 2,
        ]);
        Link::create([
            'id' => 1,
            'domain' => 'strange.rs',
            'short_link' => 'nextStar',
            'url' => 'https://de.wikipedia.org/wiki/Stranger_Things',
            'description' => 'aktiver Link ohne Ablaufdatum',
            'parameter' => null,
            'fallback' => 'www.wikipedia.org',
            'active_from' => null,
            'expires_at' => null,
            'created_by' => null,
            'redirect_count' => 0,
        ]);
        // retrieving link record from test database
        $shortURL = Link::where('id', 1)->first();
        $shortLink = $shortURL->short_link;
        $targetURL = $shortURL->url;

        // Simulate a request to the short link
        $response = $this->get($shortLink);

        // Assert that the response is a redirect to the target URL
        $response->assertStatus(302);
        $response->assertRedirect($targetURL);
    }

    public function testRedirectWithInvalidShortLink()
    {
        // Simulate a request to a non-existent short link
        $response = $this->get('/invalid-short-link');

        // Assert that the response is a 404 Not Found
        $response->assertStatus(404);
    }

    public function testRedirectWithExpiredShortLink()
    {
        // Create temporary data for testing
        Customer::create([
            'id' => 3,
            'name' => 'Hopper',
        ]);

        Campaign::create([
            'id' => 2,
            'name' => 'GoodCopBadCop',
            'customer_id' => 3,
        ]);

        Link::create([
            'id' => 3,
            'domain' => 'strange.rs',
            'short_link' => 'dschungel',
            'url' => 'https://www.youtube.com/watch?v=2AKsAxrhqgM',
            'description' => 'Link der abgelaufen ist',
            'parameter' => null,
            'fallback' => 'https://www.wikipedia.org',
            'active_from' => now()->subDays(12),
            'expires_at' => now()->subDays(10),
            'created_by' => null,
            'redirect_count' => 0,
        ]);
        // retrieving link record from test database
        $expiredShortURL = Link::where('id', 3)->first();
        $shortlink = $expiredShortURL->short_link;
        $targetURL = $expiredShortURL->url;

        // Simulate a request to the expired short link
        $response = $this->get($shortlink);

        // Assert that the response is a redirect to the fallback URL
        $response->assertStatus(302);
        $response->assertRedirect($expiredShortURL->fallback);
    }
}
