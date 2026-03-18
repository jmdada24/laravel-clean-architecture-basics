<?php

namespace App\Domain\Contacts\Repositories;

use App\Domain\Contacts\Entities\Contact;
use App\Domain\Contacts\ValueObjects\ContactId;

interface ContactRepository{
    
    public function all(): array;

    public function find(ContactId $id):  ?Contact;

    public function create(Contact $contact): Contact;

    public function update(Contact $contact): Contact;

    public function delete(ContactId $id): void;

}