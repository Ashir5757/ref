<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Location::create(
            [
                'user_id' => 1,
                'shop_id' => 1,
                'city' => 'New York',
                'state' => 'New York',
                'country' => 'United States',
            ],
            [
                'user_id' => 2,
                'shop_id' => 2,
                'city' => 'Los Angeles',
                'state' => 'California',
                'country' => 'United States',
            ],
            [
                'user_id' => 3,
                'shop_id' => 3,
                'city' => 'Chicago',
                'state' => 'Illinois',
                'country' => 'United States',
            ],
            [
                'user_id' => 4,
                'shop_id' => 4,
                'city' => 'Houston',
                'state' => 'Texas',
                'country' => 'United States',
            ],
            [
                'user_id' => 5,
                'shop_id' => 5,
                'city' => 'Phoenix',
                'state' => 'Arizona',
                'country' => 'United States',
            ],
            [
                'user_id' => 6,
                'shop_id' => 6,
                'city' => 'Philadelphia',
                'state' => 'Pennsylvania',
                'country' => 'United States',
            ],
            [
                'user_id' => 7,
                'shop_id' => 7,
                'city' => 'San Antonio',
                'state' => 'Texas',
                'country' => 'United States',
            ],
            [
                'user_id' => 8,
                'shop_id' => 8,
                'city' => 'San Diego',
                'state' => 'California',
                'country' => 'United States',
            ],
            [
                'user_id' => 9,
                'shop_id' => 9,
                'city' => 'Dallas',
                'state' => 'Texas',
                'country' => 'United States',
            ],
            [
                'user_id' => 10,
                'shop_id' => 10,
                'city' => 'San Jose',
                'state' => 'California',
                'country' => 'United States',
            ],
                
        );
    }
}
