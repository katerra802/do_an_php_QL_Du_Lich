<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'BookingDate',
        'TotalPrice',
        'Status',
        'Notes',
    ];

    protected $casts = [
        'BookingDate' => 'datetime',
    ];

    /**
     * Lượt đặt này thuộc về một User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Lượt đặt này dành cho một Tour.
     */
    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    /**
     * Một lượt đặt có nhiều chi tiết (tương ứng với nhiều hành khách).
     */
    public function details(): HasMany
    {
        return $this->hasMany(BookingDetail::class, 'booking_id');
    }

    /**
     * Một lượt đặt chỉ có một giao dịch thanh toán.
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }
}
