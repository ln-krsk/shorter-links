<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'id' => 1,
            'name' => 'HeroCampaign',
            'customer_id' => 1,
        ]);

        Campaign::create([
            'id' => 2,
            'name' => 'D&D',
            'customer_id' => 1,
        ]);

        Campaign::create([
            'id' => 3,
            'name' => 'UpsideDown',
            'customer_id' => 2,
        ]);
        Campaign::create([
            'id' => 4,
            'name' => 'GoodCop',
            'customer_id' => 3,
        ]);
    }
}
