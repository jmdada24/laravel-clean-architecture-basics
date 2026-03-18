<?php

namespace App\Domain\Contacts\ValueObjects;

final class ContactNumber{

    public function __construct(private string $value)
    {
        $this->value = trim($this->value);

        if($this->value === ''){
            throw new \InvalidArgumentException('Contact number is required');
        }

        if(mb_strlen($this->value) > 30){
            throw new \InvalidArgumentException('Contact number must be at most 30 characters');
        }
        
        if(!preg_match('/^[0-9+\-\s()]+$/', $this->value) ){
            throw new \InvalidArgumentException('Contact number has invalid characters.');
        
        }

    }
    public function value(): string{

        return $this->value;

    }

}