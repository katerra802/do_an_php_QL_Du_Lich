<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured tours (IsFeatured = true)
        $featuredTours = Tour::with(['category', 'destination', 'images'])
            ->where('IsFeatured', true)
            ->where('Status', 'Active')
            ->take(6)
            ->get();

        // Get popular tours (highest rated)
        $popularTours = Tour::with(['category', 'destination', 'images'])
            ->where('Status', 'Active')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Get all categories
        $categories = Category::all();

        // Get trending destinations (destinations with most tours)
        $destinations = Destination::withCount('tours')
            ->having('tours_count', '>', 0)
            ->orderBy('tours_count', 'desc')
            ->take(6)
            ->get();

        return view('homepage.home', compact(
            'featuredTours',
            'popularTours',
            'categories',
            'destinations'
        ));
    }
}
