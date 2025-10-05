<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'PaymentDate',
        'Amount',
        'PaymentMethod',
        'TransactionID',
        'Status',
    ];

    protected $casts = [
        'PaymentDate' => 'datetime',
    ];

    /**
     * Giao dịch thanh toán này thuộc về một Booking.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
