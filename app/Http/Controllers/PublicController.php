<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\ReviewService;
use App\Services\GalleryService;
use App\Services\ContactService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $menuService;
    protected $reviewService;
    protected $galleryService;
    protected $contactService;
    protected $settingService;

    public function __construct(
        MenuService $menuService,
        ReviewService $reviewService,
        GalleryService $galleryService,
        ContactService $contactService,
        SettingService $settingService
    ) {
        $this->menuService = $menuService;
        $this->reviewService = $reviewService;
        $this->galleryService = $galleryService;
        $this->contactService = $contactService;
        $this->settingService = $settingService;
    }

    private function getCommonData()
    {
        $settings = $this->settingService->getAllSettings();
        return [
            'seoTitle' => $settings['seo_meta_title'] ?? null,
            'seoDescription' => $settings['seo_meta_description'] ?? null,
            'phone' => $settings['phone'] ?? '0812-3486-3389',
            'address' => $settings['address'] ?? 'Ruko Adivasa, Semarang',
            'openingHours' => $settings['opening_hours'] ?? 'Open daily',
            'whatsappNumber' => $settings['whatsapp_number'] ?? '6281234863389',
            'googleMapsEmbed' => $settings['google_maps_embed'] ?? null,
            'googleMapsLink' => $settings['google_maps_link'] ?? null,
        ];
    }

    public function home()
    {
        $data = $this->getCommonData();
        $data['featuredMenus'] = $this->menuService->getFeaturedMenus();
        $data['featuredReviews'] = $this->reviewService->getFeaturedReviews();
        $data['galleryPreview'] = $this->galleryService->getAllImages()->take(6);
        return view('public.home', $data);
    }

    public function about()
    {
        $data = $this->getCommonData();
        $settings = $this->settingService->getAllSettings();
        $data['aboutStory'] = $settings['about_story'] ?? '';
        $data['aboutAtmosphere'] = $settings['about_atmosphere'] ?? '';
        return view('public.about', $data);
    }

    public function menu()
    {
        $data = $this->getCommonData();
        $data['menus'] = $this->menuService->getAllMenus();
        $data['categories'] = ['Chicken', 'Other Dishes'];
        return view('public.menu', $data);
    }

    public function reviews()
    {
        $data = $this->getCommonData();
        $data['reviews'] = $this->reviewService->getPaginatedReviews(6);
        $data['averageRating'] = $this->reviewService->getAverageRating();
        $data['ratingDistribution'] = $this->reviewService->getRatingDistribution();
        return view('public.reviews', $data);
    }

    public function gallery()
    {
        $data = $this->getCommonData();
        $data['galleryItems'] = $this->galleryService->getAllImages();
        return view('public.gallery', $data);
    }

    public function contact()
    {
        $data = $this->getCommonData();
        return view('public.contact', $data);
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        $this->contactService->submitInquiry($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
