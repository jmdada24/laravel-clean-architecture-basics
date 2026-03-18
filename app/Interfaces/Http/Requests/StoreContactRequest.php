<?php 

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest{
    
    public function authorize():bool{
        return true;
    
    }
    public function rules(): array{

        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'contact_number' => ['required', 'string', 'max:30'],

        ];
    }

}