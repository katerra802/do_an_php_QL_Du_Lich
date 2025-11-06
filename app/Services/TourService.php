<?php

namespace App\Services;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Builder;

class TourService
{
    /**
     * Lấy danh sách tour với filter
     */
    public function getTours($filters = [])
    {
        $query = Tour::with(['category', 'destination', 'images'])
            ->whereNull('deleted_at');

        // Filter theo destination
        if (!empty($filters['destination_id'])) {
            $query->where('destination_id', $filters['destination_id']);
        }

        // Filter theo category
        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        // Filter theo price range
        if (!empty($filters['min_price'])) {
            $query->where('PriceAdult', '>=', $filters['min_price']);
        }

        if (!empty($filters['max_price'])) {
            $query->where('PriceAdult', '<=', $filters['max_price']);
        }

        // Filter theo ngày bắt đầu
        if (!empty($filters['start_date'])) {
            $query->where('StartDate', '>=', $filters['start_date']);
        }

        // Filter theo đánh giá (rating)
        if (!empty($filters['rating'])) {
            $query->where('AverageRating', '>=', $filters['rating']);
        }

        // Search theo tên
        if (!empty($filters['search'])) {
            $query->where('TourName', 'like', '%' . $filters['search'] . '%');
        }

        // Sắp xếp
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';

        $query->orderBy($sortBy, $sortOrder);

        return $query;
    }

    /**
     * Lấy chi tiết tour theo ID
     */
    public function getTourDetail($id)
    {
        return Tour::with([
            'category',
            'destination',
            'images',
            'bookings' => function ($query) {
                $query->where('Status', 'confirmed')->count();
            }
        ])->findOrFail($id);
    }

    /**
     * Get số chỗ còn trống
     */
    public function getAvailableSeats($tourId)
    {
        $tour = Tour::findOrFail($tourId);

        // Đếm số booking đã confirmed
        $confirmedBookings = $tour->bookings()
            ->whereIn('Status', ['Confirmed', 'Pending'])
            ->count();

        return max(0, $tour->MaxSeats - $confirmedBookings);
    }

    /**
     * Parse itinerary từ JSON hoặc text
     */
    public function parseItinerary($tour)
    {
        if (empty($tour->DetailedItinerary)) {
            return [];
        }

        // Nếu là JSON
        $decoded = json_decode($tour->DetailedItinerary, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        // Nếu là text, parse theo format "Day X: ..."
        $lines = explode("\n", $tour->DetailedItinerary);
        $itinerary = [];
        $currentDay = null;

        foreach ($lines as $line) {
            $line = trim($line);
            if (preg_match('/^Day\s+(\d+):\s*(.+)/i', $line, $matches)) {
                $currentDay = [
                    'day' => (int)$matches[1],
                    'title' => $matches[2],
                    'description' => ''
                ];
                $itinerary[] = &$currentDay;
            } elseif ($currentDay && !empty($line)) {
                $currentDay['description'] .= $line . ' ';
            }
        }

        return $itinerary;
    }

    /**
     * Tính giá cho booking
     */
    public function calculatePrice($tour, $adults, $children)
    {
        $adultPrice = $tour->PriceAdult * $adults;
        $childPrice = $tour->PriceChild * $children;

        return [
            'adult_price' => $adultPrice,
            'child_price' => $childPrice,
            'total' => $adultPrice + $childPrice,
            'per_person' => $adults > 0 ? ($adultPrice + $childPrice) / ($adults + $children) : 0
        ];
    }

    /**
     * Lấy các tour liên quan
     */
    public function getRelatedTours($tour, $limit = 4)
    {
        return Tour::with(['category', 'destination', 'images'])
            ->where('id', '!=', $tour->id)
            ->where(function ($query) use ($tour) {
                $query->where('destination_id', $tour->destination_id)
                    ->orWhere('category_id', $tour->category_id);
            })
            ->whereNull('deleted_at')
            ->limit($limit)
            ->get();
    }
}
