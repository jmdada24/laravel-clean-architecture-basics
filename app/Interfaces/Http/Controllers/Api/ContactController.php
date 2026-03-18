<?php

namespace App\Interfaces\Http\Controllers\Api;

use App\Application\Contacts\DTO\ContactData;
use App\Application\Contacts\UseCases\CreateContact;
use App\Application\Contacts\UseCases\DeleteContact;
use App\Application\Contacts\UseCases\ListContacts;
use App\Application\Contacts\UseCases\UpdateContact;
use App\Interfaces\Http\Requests\StoreContactRequest;
use App\Interfaces\Http\Requests\UpdateContactRequest;
use App\Interfaces\Http\Resources\ContactResource;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function index(ListContacts $listContacts)
    {
        $contacts = $listContacts->execute();

        return ContactResource::collection($contacts);
    }

    public function store(StoreContactRequest $request, CreateContact $createContact)
    {
        $data = new ContactData(
            $request->string('first_name'),
            $request->string('last_name'),
            $request->string('contact_number'),
        );

        $created = $createContact->execute($data);

        return (new ContactResource($created))
            ->response()
            ->setStatusCode(201);
    }

    public function update(int $id, UpdateContactRequest $request, UpdateContact $updateContact)
    {
        $data = new ContactData(
            $request->string('first_name'),
            $request->string('last_name'),
            $request->string('contact_number'),
        );

        $updated = $updateContact->execute($id, $data);

        return new ContactResource($updated);
    }

    public function destroy(int $id, DeleteContact $deleteContact)
    {
        $deleteContact->execute($id);

        return response()->noContent();
    }
}