<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'rating',
        'review',
        'featured',
    ];

    protected $casts = [
        'rating' => 'integer',
        'featured' => 'boolean',
    ];
}
