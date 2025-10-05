<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'DestinationName',
        'Country',
        'Description',
        'ImagePath',
        'AverageRating',
    ];

    /**
     * Một điểm đến có thể thuộc nhiều Tour.
     */
    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class, 'destination_id');
    }
}
