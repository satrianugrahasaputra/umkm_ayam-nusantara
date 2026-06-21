<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->getAllMenus();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = ['Chicken', 'Other Dishes'];
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menus', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $this->menuService->createMenu($validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item created successfully.');
    }

    public function edit($id)
    {
        $menu = $this->menuService->getMenuById($id);
        $categories = ['Chicken', 'Other Dishes'];
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $menu = $this->menuService->getMenuById($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($menu->image && file_exists(public_path($menu->image))) {
                @unlink(public_path($menu->image));
            }
            $path = $request->file('image')->store('menus', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $this->menuService->updateMenu($id, $validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $this->menuService->deleteMenu($id);
        return redirect()->route('admin.menus.index')->with('success', 'Menu item deleted successfully.');
    }
}
