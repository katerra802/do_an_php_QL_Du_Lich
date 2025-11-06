<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\TourImage;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $tour1 = Tour::create([
            'TourName' => 'Phi Phi Islands Adventure',
            'Description' => 'Explore the stunning Phi Phi Islands with crystal clear waters.',
            'DetailedItinerary' => "Day 1: Island Hopping\nVisit Maya Bay and Pileh Lagoon.",
            'StartDate' => now()->addDays(7),
            'EndDate' => now()->addDays(8),
            'PriceAdult' => 1200,
            'PriceChild' => 800,
            'MaxSeats' => 40,
            'DeparturePoint' => 'Phuket Pier',
            'IncludedServices' => 'Hotel transfers, Speed boat, Lunch, Equipment',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?w=800',
            'IsFeatured' => true,
            'category_id' => 3,
            'destination_id' => 1,
        ]);
        TourImage::create(['tour_id' => $tour1->id, 'ImageURL' => $tour1->FeaturedImage]);

        $tour2 = Tour::create([
            'TourName' => 'Bangkok Temple Tour',
            'Description' => 'Discover magnificent temples and Grand Palace.',
            'DetailedItinerary' => "Day 1: Visit Wat Phra Kaew, Grand Palace.",
            'StartDate' => now()->addDays(5),
            'EndDate' => now()->addDays(5),
            'PriceAdult' => 800,
            'PriceChild' => 500,
            'MaxSeats' => 30,
            'DeparturePoint' => 'Bangkok Hotel',
            'IncludedServices' => 'Pickup, Guide, Fees',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1563492065567-9f4b9a0b1d1f?w=800',
            'IsFeatured' => true,
            'category_id' => 2,
            'destination_id' => 2,
        ]);
        TourImage::create(['tour_id' => $tour2->id, 'ImageURL' => $tour2->FeaturedImage]);

        $tour3 = Tour::create([
            'TourName' => 'Chiang Mai Elephant Sanctuary',
            'Description' => 'Spend a day with rescued elephants.',
            'DetailedItinerary' => "Day 1: Feed and bathe elephants.",
            'StartDate' => now()->addDays(10),
            'EndDate' => now()->addDays(10),
            'PriceAdult' => 1500,
            'PriceChild' => 1000,
            'MaxSeats' => 20,
            'DeparturePoint' => 'Chiang Mai Old City',
            'IncludedServices' => 'Transfers, Lunch, Guide',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1564760055775-d63b17a55c44?w=800',
            'IsFeatured' => true,
            'category_id' => 1,
            'destination_id' => 3,
        ]);
        TourImage::create(['tour_id' => $tour3->id, 'ImageURL' => $tour3->FeaturedImage]);

        $tour4 = Tour::create([
            'TourName' => 'Pattaya Floating Market',
            'Description' => 'Visit floating market and garden.',
            'DetailedItinerary' => "Day 1: Market and garden tour.",
            'StartDate' => now()->addDays(3),
            'EndDate' => now()->addDays(3),
            'PriceAdult' => 900,
            'PriceChild' => 600,
            'MaxSeats' => 35,
            'DeparturePoint' => 'Pattaya Beach',
            'IncludedServices' => 'Pickup, Guide, Lunch',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?w=800',
            'category_id' => 4,
            'destination_id' => 4,
        ]);
        TourImage::create(['tour_id' => $tour4->id, 'ImageURL' => $tour4->FeaturedImage]);

        $tour5 = Tour::create([
            'TourName' => 'Krabi 4 Islands Tour',
            'Description' => 'Island hopping adventure.',
            'DetailedItinerary' => "Day 1: Visit 4 islands.",
            'StartDate' => now()->addDays(14),
            'EndDate' => now()->addDays(14),
            'PriceAdult' => 1000,
            'PriceChild' => 700,
            'MaxSeats' => 25,
            'DeparturePoint' => 'Ao Nang Beach',
            'IncludedServices' => 'Boat, Lunch, Equipment',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1589394815804-964ed0be2eb5?w=800',
            'category_id' => 3,
            'destination_id' => 5,
        ]);
        TourImage::create(['tour_id' => $tour5->id, 'ImageURL' => $tour5->FeaturedImage]);

        $tour6 = Tour::create([
            'TourName' => 'Bangkok Street Food Tour',
            'Description' => 'Experience Bangkok street food.',
            'DetailedItinerary' => "Day 1: Visit 7 food stalls.",
            'StartDate' => now()->addDays(2),
            'EndDate' => now()->addDays(2),
            'PriceAdult' => 700,
            'PriceChild' => 500,
            'MaxSeats' => 12,
            'DeparturePoint' => 'BTS Sala Daeng',
            'IncludedServices' => 'All food, Guide',
            'FeaturedImage' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800',
            'IsFeatured' => true,
            'category_id' => 5,
            'destination_id' => 2,
        ]);
        TourImage::create(['tour_id' => $tour6->id, 'ImageURL' => $tour6->FeaturedImage]);
    }
}
