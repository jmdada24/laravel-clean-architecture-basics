<?php

namespace App\Domain\Contacts\ValueObjects;

final class ContactId
{
    public function __construct(private int $value)
    {
        if($value <= 0){
            throw new \InvalidArgumentException('ContactId must be a positive integer');
        }
        
        
    }

    public function value(): int{
        return $this->value;

    }


}