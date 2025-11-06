<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'CategoryName' => 'Adventure Tours',
                'Description' => 'Exciting adventures and outdoor activities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CategoryName' => 'Cultural Tours',
                'Description' => 'Explore local culture and traditions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CategoryName' => 'Beach & Water',
                'Description' => 'Beach activities and water sports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CategoryName' => 'City Tours',
                'Description' => 'Discover city attractions and landmarks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CategoryName' => 'Food & Drink',
                'Description' => 'Culinary experiences and local cuisine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
}
