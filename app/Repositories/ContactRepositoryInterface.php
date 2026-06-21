<?php

namespace App\Repositories;

interface ContactRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function delete($id);
    public function count();
}
