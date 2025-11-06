<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Phang Nga Bay Tour',
                'description' => 'Explore the stunning limestone cliffs and emerald waters of Phang Nga Bay. Visit James Bond Island and take in breathtaking views.',
                'category' => 'Tours & Sightseeing',
                'duration' => '8 hours',
                'price' => 45.99,
                'rating' => 4.8,
                'image' => 'activities/phang-nga.jpg',
            ],
            [
                'title' => 'Jungle Trekking Adventure',
                'description' => 'Experience the lush rainforests of Phuket with an exciting jungle trek. Spot exotic wildlife and discover hidden waterfalls.',
                'category' => 'Adventure',
                'duration' => '6 hours',
                'price' => 35.99,
                'rating' => 4.6,
                'image' => 'activities/jungle-trek.jpg',
            ],
            [
                'title' => 'Sunset Cruise',
                'description' => 'Sail into the sunset on a luxurious catamaran. Enjoy champagne and snacks while watching the sky turn golden.',
                'category' => 'Water Sports',
                'duration' => '3 hours',
                'price' => 55.99,
                'rating' => 4.9,
                'image' => 'activities/sunset-cruise.jpg',
            ],
            [
                'title' => 'Scuba Diving',
                'description' => 'Dive into the crystal-clear waters and discover vibrant coral reefs and marine life. Perfect for beginners and experts.',
                'category' => 'Water Sports',
                'duration' => '4 hours',
                'price' => 65.99,
                'rating' => 4.7,
                'image' => 'activities/diving.jpg',
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
