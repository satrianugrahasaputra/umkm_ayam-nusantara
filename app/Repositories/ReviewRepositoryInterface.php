<?php

namespace App\Repositories;

interface ReviewRepositoryInterface
{
    public function all();
    public function paginated($perPage = 6);
    public function getFeatured();
    public function getAverageRating();
    public function getRatingDistribution();
    public function create(array $data);
    public function update($id, array $data);
    public function toggleFeatured($id);
    public function delete($id);
}
