<?php

namespace App\Repositories;

interface MenuRepositoryInterface
{
    public function all();
    public function find($id);
    public function getFeatured();
    public function getByCategory($category);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
