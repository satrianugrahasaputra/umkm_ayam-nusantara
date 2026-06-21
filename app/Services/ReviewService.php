<?php

namespace App\Services;

use App\Repositories\ReviewRepositoryInterface;

class ReviewService
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function getAllReviews()
    {
        return $this->reviewRepo->all();
    }

    public function getPaginatedReviews($perPage = 6)
    {
        return $this->reviewRepo->paginated($perPage);
    }

    public function getFeaturedReviews()
    {
        return $this->reviewRepo->getFeatured();
    }

    public function getAverageRating()
    {
        return $this->reviewRepo->getAverageRating();
    }

    public function getRatingDistribution()
    {
        return $this->reviewRepo->getRatingDistribution();
    }

    public function createReview(array $data)
    {
        return $this->reviewRepo->create($data);
    }

    public function updateReview($id, array $data)
    {
        return $this->reviewRepo->update($id, $data);
    }

    public function toggleFeaturedReview($id)
    {
        return $this->reviewRepo->toggleFeatured($id);
    }

    public function deleteReview($id)
    {
        return $this->reviewRepo->delete($id);
    }
}
