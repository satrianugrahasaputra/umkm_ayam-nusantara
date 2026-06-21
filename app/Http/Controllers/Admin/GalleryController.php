<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function index()
    {
        $galleryItems = $this->galleryService->getAllImages();
        $categories = ['Food Photos', 'Restaurant Atmosphere', 'Menu Showcase', 'Customer Experience'];
        return view('admin.gallery.index', compact('galleryItems', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'category' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $this->galleryService->addImage($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo added to gallery successfully.');
    }

    public function destroy($id)
    {
        $this->galleryService->deleteImage($id);
        return redirect()->route('admin.gallery.index')->with('success', 'Photo deleted from gallery successfully.');
    }
}
