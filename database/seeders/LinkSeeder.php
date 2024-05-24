<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create active link
        Link::create([
            'id' => 1,
            'domain' => 'strange.rs',
            'campaign_id' => 3,
            'short_link' => 'horror',
            'url' => 'https://de.wikipedia.org/wiki/Stranger_Things',
            'description' => 'aktiver Link ohne Ablaufdatum',
            'parameter' => '?utm_source=tv&utm_medium=series&utm_campaign=stranger_things',
            'fallback' => 'www.wikipedia.org',
            'active_from' => null,
            'expires_at' => null,
            'created_by' => null,
            'redirect_count' => 12,
        ]);

        // create link, that is not yet active (upcoming)
        Link::create([
            'id' => 2,
            'domain' => 'strange.rs',
            'campaign_id' => 1,
            'short_link' => 'dragons',
            'url' => 'https://www.youtube.com/watch?v=2AKsAxrhqgM',
            'description' => 'Link der noch nicht aktiv ist',
            'parameter' => null,
            'fallback' => 'www.wikipedia.org',
            'active_from' => now()->addDays(10),
            'expires_at' => now()->addDays(12),
            'created_by' => 1,
            'redirect_count' => 0,
        ]);

        // create expired Link
        Link::create([
            'id' => 3,
            'domain' => 'strange.rs',
            'campaign_id' => 4,
            'short_link' => 'adventure',
            'url' => 'https://www.youtube.com/watch?v=S0u3tWZmtxg',
            'description' => 'Link der abgelaufen ist',
            'parameter' => '?utm_source=newsletter&utm_medium=email',
            'fallback' => 'www.wikipedia.org',
            'active_from' => now()->subDays(12),
            'expires_at' => now()->subDays(10),
            'created_by' => 1,
            'redirect_count' => 169,
        ]);
    }
}
