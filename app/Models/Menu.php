<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'description',
        'price',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'integer',
    ];
}
