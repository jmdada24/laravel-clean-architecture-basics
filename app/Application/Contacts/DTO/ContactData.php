<?php

namespace App\Application\Contacts\DTO;

final class ContactData{
    public function __construct( 
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $contactNumber)
    {
       

    }

}