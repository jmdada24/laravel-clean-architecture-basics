<?php

namespace App\Infrastructure\Persistence\Eloquent\Mappers;

use App\Domain\Contacts\Entities\Contact;
use App\Domain\Contacts\ValueObjects\ContactId;
use App\Domain\Contacts\ValueObjects\Name;
use App\Domain\Contacts\ValueObjects\ContactNumber;
use App\Infrastructure\Persistence\Eloquent\Models\ContactModel;

final class ContactMapper{

    public function toEntity(ContactModel $model ): Contact{

    $name = new Name($model->first_name, $model->last_name);
    $number = new ContactNumber($model->contact_number);


    return new Contact( new ContactId($model->id), $name, $number);

    }


    public function toModelData(Contact $contact): array{

    return [
        'first_name' => $contact->name()->first(),
        'last_name' => $contact->name()->last(),
        'contact_number' => $contact->contactNumber()->value(),
    ];

    }

}