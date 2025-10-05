<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'CategoryName',
        'Description',
    ];

    /**
     * Một danh mục có nhiều Tour.
     */
    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class, 'category_id');
    }
}
