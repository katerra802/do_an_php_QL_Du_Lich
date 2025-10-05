<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes; // Thêm SoftDeletes nếu migration của bạn có

    protected $fillable = [
        'TourName',
        'Description',
        'DetailedItinerary',
        'StartDate',
        'EndDate',
        'PriceAdult',
        'PriceChild',
        'MaxSeats',
        'DeparturePoint',
        'IncludedServices',
        'ExcludedServices',
        'FeaturedImage',
        'category_id',
        'destination_id',
        'Status',
        'IsFeatured',
    ];

    protected $casts = [
        'StartDate' => 'datetime',
        'EndDate' => 'datetime',
    ];

    /**
     * Một Tour thuộc về một Danh mục (Category).
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Một Tour thuộc về một Điểm đến (Destination).
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    /**
     * Một Tour có nhiều ảnh trong gallery.
     */
    public function images(): HasMany
    {
        return $this->hasMany(TourImage::class, 'tour_id');
    }

    /**
     * Một Tour có nhiều lượt đặt (Booking).
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'tour_id');
    }
}
