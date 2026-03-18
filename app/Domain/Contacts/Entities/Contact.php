<?php 

namespace App\Domain\Contacts\Entities;

use App\Domain\Contacts\ValueObjects\ContactId;
use App\Domain\Contacts\ValueObjects\Name;
use App\Domain\Contacts\ValueObjects\ContactNumber;


final class Contact{ 

    private ?ContactId $id;

    public function __construct(?ContactId $id, private Name $name, private ContactNumber $contactNumber)
    {
        $this->id = $id;

    }

    public static function new(Name $name, ContactNumber $contactNumber):self{

        return new self(null, $name, $contactNumber);

    }

    public function id(): ?ContactId{

        return $this->id;

    }

    public function name(): Name{
        return $this->name;

    }

    public function contactNumber(): ContactNumber{
        return $this->contactNumber;

    }
    
    public function withId(ContactId $id): self{

    return new self($id, $this->name, $this->contactNumber);
    
    }


    public function rename(Name $name): void{
        $this->name = $name;

    }

    public function changeNumber(ContactNumber $contactNumber): void{
        $this->contactNumber = $contactNumber;

    }

}