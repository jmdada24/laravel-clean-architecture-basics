<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model{

    protected $table = 'contacts';

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',

    ];

}
