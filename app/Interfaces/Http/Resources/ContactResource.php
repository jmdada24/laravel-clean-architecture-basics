<?php

namespace App\Interfaces\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource{

    public function toArray($request): array
    {   
        return[
            'id' => $this->id()?->value(),
            'first_name' => $this->name()->first(),
            'last_name' => $this->name()->last(),
            'contact_number' => $this->contactNumber()->value(),
        ];
    }
   
}