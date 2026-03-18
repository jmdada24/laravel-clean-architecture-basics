<?php 


namespace App\Application\Contacts\UseCases;

use App\Application\Contacts\DTO\ContactData;
use App\Domain\Contacts\Exceptions\ContactNotFound;
use App\Domain\Contacts\Repositories\ContactRepository;
use App\Domain\Contacts\ValueObjects\ContactId;
use App\Domain\Contacts\ValueObjects\ContactNumber;
use App\Domain\Contacts\ValueObjects\Name;


final class UpdateContact{

    public function __construct(private ContactRepository $contacts)
    {

    }
    
    public function execute(int $id, ContactData $data){
        $contactId = new ContactId($id);

        $contact = $this->contacts->find($contactId);
        if(!$contact){
            throw new ContactNotFound("Contact {$id} Not Found.");

        }
        
        

        $contact->rename(new Name($data->firstName, $data->lastName));
        $contact->changeNumber(new ContactNumber($data->contactNumber));

        return $this->contacts->update($contact);

    }
}