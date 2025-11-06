<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'DestinationName' => 'Phuket',
                'Country' => 'Thailand',
                'Description' => 'Beautiful beaches and vibrant nightlife',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DestinationName' => 'Bangkok',
                'Country' => 'Thailand',
                'Description' => 'The vibrant capital city of Thailand',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DestinationName' => 'Chiang Mai',
                'Country' => 'Thailand',
                'Description' => 'Mountain city with temples and culture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DestinationName' => 'Pattaya',
                'Country' => 'Thailand',
                'Description' => 'Coastal city with beaches and entertainment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DestinationName' => 'Krabi',
                'Country' => 'Thailand',
                'Description' => 'Stunning limestone cliffs and islands',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Destination::insert($destinations);
    }
}
