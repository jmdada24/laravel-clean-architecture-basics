<?php

namespace App\Application\Contacts\UseCases;

use App\Domain\Contacts\Repositories\ContactRepository;

final class ListContacts{
    public function __construct(private ContactRepository $contacts)
    {

    }

    
    public function execute():array{
        return $this->contacts->all();

    }

}