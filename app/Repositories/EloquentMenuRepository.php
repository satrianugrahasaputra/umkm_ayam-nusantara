<?php

namespace App\Repositories;

use App\Models\Menu;

class EloquentMenuRepository implements MenuRepositoryInterface
{
    public function all()
    {
        $c1 = 'category';
        $c2 = 'title';
        return Menu::orderBy($c1)->orderBy($c2)->get();
    }

    public function find($id)
    {
        return Menu::findOrFail($id);
    }

    public function getFeatured()
    {
        $c = 'is_featured';
        return Menu::where($c, true)->get();
    }

    public function getByCategory($category)
    {
        $c1 = 'category';
        $c2 = 'title';
        return Menu::where($c1, $category)->orderBy($c2)->get();
    }

    public function create(array $data)
    {
        return Menu::create($data);
    }

    public function update($id, array $data)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($data);
        return $menu;
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        return $menu->delete();
    }
}
