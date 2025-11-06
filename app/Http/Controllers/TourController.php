<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Services\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    /**
     * Hiển thị danh sách tour (Tour Listing Page)
     */
    public function index(Request $request)
    {
        // Lấy tất cả destinations và categories cho filter
        $destinations = Destination::all();
        $categories = Category::all();

        // Lấy filter params từ request
        $filters = [
            'destination_id' => $request->get('destination_id'),
            'category_id' => $request->get('category_id'),
            'min_price' => $request->get('min_price'),
            'max_price' => $request->get('max_price'),
            'start_date' => $request->get('start_date'),
            'rating' => $request->get('rating'),
            'search' => $request->get('search'),
            'sort_by' => $request->get('sort_by', 'created_at'),
            'sort_order' => $request->get('sort_order', 'desc'),
        ];

        // Lấy tours với filter
        $tours = $this->tourService->getTours($filters)->paginate(12);

        return view('tours.index', [
            'tours' => $tours,
            'destinations' => $destinations,
            'categories' => $categories,
            'filters' => $filters,
        ]);
    }

    /**
     * Hiển thị chi tiết tour (Tour Detail Page)
     */
    public function show($id)
    {
        $tour = $this->tourService->getTourDetail($id);

        // Parse itinerary
        $itinerary = $this->tourService->parseItinerary($tour);

        // Tính số chỗ còn trống
        $availableSeats = $this->tourService->getAvailableSeats($id);

        // Lấy tour liên quan
        $relatedTours = $this->tourService->getRelatedTours($tour, 4);

        return view('tours.show', [
            'tour' => $tour,
            'itinerary' => $itinerary,
            'availableSeats' => $availableSeats,
            'relatedTours' => $relatedTours,
        ]);
    }

    /**
     * API: Tính giá khi chọn số người
     */
    public function calculatePrice(Request $request, $id)
    {
        $tour = $this->tourService->getTourDetail($id);

        $adults = $request->get('adults', 1);
        $children = $request->get('children', 0);

        $pricing = $this->tourService->calculatePrice($tour, $adults, $children);

        return response()->json([
            'success' => true,
            'pricing' => $pricing
        ]);
    }

    /**
     * Xử lý booking (chuyển sang BookingController hoặc xử lý ở đây)
     */
    public function booking(Request $request, $id)
    {
        // Validate
        $validated = $request->validate([
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'date' => 'required|date|after_or_equal:today',
        ]);

        // Chuyển sang trang booking hoặc xử lý logic booking
        return redirect()->route('bookings.create', [
            'tourId' => $id,
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0,
            'date' => $validated['date'],
        ]);
    }
}
