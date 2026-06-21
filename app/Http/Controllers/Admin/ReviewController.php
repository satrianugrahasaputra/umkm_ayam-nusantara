<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->getAllReviews();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleFeatured($id)
    {
        $this->reviewService->toggleFeaturedReview($id);
        return back()->with('success', 'Review status updated successfully.');
    }

    public function destroy($id)
    {
        $this->reviewService->deleteReview($id);
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
