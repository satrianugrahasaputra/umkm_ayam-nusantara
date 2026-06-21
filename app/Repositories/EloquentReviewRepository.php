<?php

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\DB;

class EloquentReviewRepository implements ReviewRepositoryInterface
{
    public function all()
    {
        return Review::latest()->get();
    }

    public function paginated($perPage = 6)
    {
        return Review::latest()->paginate($perPage);
    }

    public function getFeatured()
    {
        $column = 'featured';
        return Review::where($column, true)->latest()->get();
    }

    public function getAverageRating()
    {
        return round(Review::avg('rating') ?? 4.8, 1);
    }

    public function getRatingDistribution()
    {
        $distribution = [];
        $items = Review::select('rating', DB::raw('count(*) as total'))
            ->groupBy('rating')
            ->get();

        foreach ($items as $item) {
            $distribution[$item->rating] = (int)$item->total;
        }

        // Ensure 1-5 keys exist
        for ($i = 1; $i <= 5; $i++) {
            if (!isset($distribution[$i])) {
                $distribution[$i] = 0;
            }
        }

        return $distribution;
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        return $review;
    }

    public function toggleFeatured($id)
    {
        $review = Review::findOrFail($id);
        $review->featured = !$review->featured;
        $review->save();
        return $review;
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        return $review->delete();
    }
}
