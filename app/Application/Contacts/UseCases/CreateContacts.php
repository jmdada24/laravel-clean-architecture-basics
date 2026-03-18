<?php

namespace App\Application\Contacts\UseCases;

use App\Application\Contacts\DTO\ContactData;
use App\Domain\Contacts\Entities\Contact;
use App\Domain\Contacts\Repositories\ContactRepository;
use App\Domain\Contacts\ValueObjects\ContactNumber;
use App\Domain\Contacts\ValueObjects\Name;


final class CreateContact{
    public function __construct(private ContactRepository $contacts)
    {
    
    }

    public function execute(ContactData $data): Contact{
        $name = new Name($data->firstName, $data->lastName);
        $number = new ContactNumber($data->contactNumber);

        $contact = Contact::new($name, $number);

      return $this->contacts->create($contact);

    }


}