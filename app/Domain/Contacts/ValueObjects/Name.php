<?php

namespace App\Domain\Contacts\ValueObjects;

final class Name{
    public function __construct(private string $first, private string $last)
    {
        $this->first = trim($this->first);
        $this->last = trim($this->last);

        if($this->first === '' || $this->last === ''){
            throw new \InvalidArgumentException('First name and Last name required');

        }

        if(mb_strlen($this->first) > 100 || mb_strlen($this->last) > 100){
            throw new \InvalidArgumentException('Names must be at most 100 characters');

        }

    }

    public function first(): string{

    return $this->first;
    }

    public function last(): string{

    return $this->last;
    }

    public function full(): string{

    return $this->first . ' ' . $this->last;
    
    }

}


