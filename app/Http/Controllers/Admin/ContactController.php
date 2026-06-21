<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllInquiries();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $this->contactService->deleteInquiry($id);
        return redirect()->route('admin.contacts.index')->with('success', 'Inquiry deleted successfully.');
    }
}
