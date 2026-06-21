<?php

namespace App\Services;

use App\Repositories\ContactRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ContactService
{
    protected $contactRepo;

    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function getAllInquiries()
    {
        return $this->contactRepo->all();
    }

    public function submitInquiry(array $data)
    {
        $contact = $this->contactRepo->create($data);

        // We can add log/notification triggering here
        Log::info("New contact inquiry received: ID {$contact->id} from {$contact->email}");

        return $contact;
    }

    public function deleteInquiry($id)
    {
        return $this->contactRepo->delete($id);
    }

    public function getInquiryCount()
    {
        return $this->contactRepo->count();
    }
}
