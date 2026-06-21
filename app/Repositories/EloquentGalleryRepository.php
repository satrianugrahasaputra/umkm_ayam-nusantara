<?php

namespace App\Repositories;

use App\Models\Gallery;

class EloquentGalleryRepository implements GalleryRepositoryInterface
{
    public function all()
    {
        return Gallery::latest()->get();
    }

    public function getByCategory($category)
    {
        $column = 'category';
        return Gallery::where($column, $category)->latest()->get();
    }

    public function create(array $data)
    {
        return Gallery::create($data);
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);
        return $gallery->delete();
    }
}
