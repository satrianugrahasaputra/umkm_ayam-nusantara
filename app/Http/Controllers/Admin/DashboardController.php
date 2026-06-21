<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use App\Services\ReviewService;
use App\Services\GalleryService;
use App\Services\ContactService;

class DashboardController extends Controller
{
    protected $menuService;
    protected $reviewService;
    protected $galleryService;
    protected $contactService;

    public function __construct(
        MenuService $menuService,
        ReviewService $reviewService,
        GalleryService $galleryService,
        ContactService $contactService
    ) {
        $this->menuService = $menuService;
        $this->reviewService = $reviewService;
        $this->galleryService = $galleryService;
        $this->contactService = $contactService;
    }

    public function index()
    {
        $menusCount = $this->menuService->getAllMenus()->count();
        $reviewsCount = $this->reviewService->getAllReviews()->count();
        $galleryCount = $this->galleryService->getAllImages()->count();
        $contactsCount = $this->contactService->getInquiryCount();
        $recentContacts = $this->contactService->getAllInquiries()->take(5);

        return view('admin.dashboard', compact(
            'menusCount',
            'reviewsCount',
            'galleryCount',
            'contactsCount',
            'recentContacts'
        ));
    }
}
