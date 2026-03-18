<?php 

namespace App\Application\Contacts\UseCases;

use App\Domain\Contacts\Repositories\ContactRepository;
use App\Domain\Contacts\ValueObjects\ContactId;

final class DeleteContact{
    public function __construct(private ContactRepository $contacts)
    {
        
    }

    public function execute(int $id): void{
        
        $this->contacts->delete(new ContactId($id));

    }


    


}