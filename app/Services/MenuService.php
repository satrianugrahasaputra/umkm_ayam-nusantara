<?php

namespace App\Services;

use App\Repositories\MenuRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    protected $menuRepo;

    public function __construct(MenuRepositoryInterface $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function getAllMenus()
    {
        return $this->menuRepo->all();
    }

    public function getFeaturedMenus()
    {
        return $this->menuRepo->getFeatured();
    }

    public function getMenusByCategory($category)
    {
        return $this->menuRepo->getByCategory($category);
    }

    public function getMenuById($id)
    {
        return $this->menuRepo->find($id);
    }

    public function createMenu(array $data)
    {
        return $this->menuRepo->create($data);
    }

    public function updateMenu($id, array $data)
    {
        return $this->menuRepo->update($id, $data);
    }

    public function deleteMenu($id)
    {
        $menu = $this->menuRepo->find($id);
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        return $this->menuRepo->delete($id);
    }
}
