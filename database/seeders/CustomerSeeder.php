<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'id' => 1,
            'name' => 'Eleven',
        ]);

        Customer::create([
            'id' => 2,
            'name' => 'Vecna',
        ]);

        Customer::create([
            'id' => 3,
            'name' => 'Hopper',
        ]);
    }
}
