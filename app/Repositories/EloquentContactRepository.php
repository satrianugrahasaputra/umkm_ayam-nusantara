<?php

namespace App\Repositories;

use App\Models\Contact;

class EloquentContactRepository implements ContactRepositoryInterface
{
    public function all()
    {
        return Contact::latest()->get();
    }

    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact->delete();
    }

    public function count()
    {
        return Contact::count();
    }
}
