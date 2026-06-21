<?php

namespace App\Services;

use App\Repositories\GalleryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    protected $galleryRepo;

    public function __construct(GalleryRepositoryInterface $galleryRepo)
    {
        $this->galleryRepo = $galleryRepo;
    }

    public function getAllImages()
    {
        return $this->galleryRepo->all();
    }

    public function getImagesByCategory($category)
    {
        return $this->galleryRepo->getByCategory($category);
    }

    public function addImage(array $data)
    {
        return $this->galleryRepo->create($data);
    }

    public function deleteImage($id)
    {
        $image = \App\Models\Gallery::findOrFail($id);
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        return $this->galleryRepo->delete($id);
    }
}
