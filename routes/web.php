<?php

use App\Application\Contacts\DTO\ContactData;
use App\Application\Contacts\UseCases\CreateContact;
use App\Application\Contacts\UseCases\DeleteContact;
use App\Application\Contacts\UseCases\ListContacts;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Testing Routes okay..
Route::get('/dev/contacts', function (ListContacts $listContacts){
    $contacts = $listContacts->execute();

    return array_map(function ($c){

       return [
            'id' => $c->id()?->value(),
            'first_name' => $c->name()->first(),
            'last_name' => $c->name()->last(),
            'contact_number' => $c->contactNumber()->value(),
       ];


    }, $contacts);

});

Route::get('/dev/contacts/create', function (CreateContact $createContact) {

        $first = request()->query('first', '');
        $last =  request()->query('last', '');
        $number = request()->query('number', '');

        $data = new ContactData($first, $last, $number);

        $created = $createContact->execute($data);

        return [
            'message' => 'created',
            'contact' => [
                'id' => $created->id()?->value(),
                'first_name' => $created->name()->first(),
                'last_name' => $created->name()->last(),
                'contact_number' => $created->contactNumber()->value(),
            ],


        ];
});

Route::get('/dev/contacts/delete/{id}', function (int $id, DeleteContact $deleteContact){
    $deleteContact->execute($id);
    
    return[
        'message' => "deleted contact {$id}",
        
    ];

});