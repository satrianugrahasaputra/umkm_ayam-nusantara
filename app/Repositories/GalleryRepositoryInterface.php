<?php

namespace App\Repositories;

interface GalleryRepositoryInterface
{
    public function all();
    public function getByCategory($category);
    public function create(array $data);
    public function delete($id);
}
