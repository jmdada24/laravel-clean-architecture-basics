<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Contacts\Entities\Contact;
use App\Domain\Contacts\Exceptions\ContactNotFound;
use App\Domain\Contacts\Repositories\ContactRepository;
use App\Domain\Contacts\ValueObjects\ContactId;
use App\Infrastructure\Persistence\Eloquent\Mappers\ContactMapper;
use App\Infrastructure\Persistence\Eloquent\Models\ContactModel;

use InvalidArgumentException;

final class EloquentContactRepository implements ContactRepository{

    public function __construct(private ContactMapper $mapper)
    {

    }

    public function all(): array{
       
        return ContactModel::query()
            ->latest()
            ->get()
            ->map(fn(ContactModel $m) =>  $this->mapper->toEntity($m))
            ->all();

    }

    public function find(ContactId $id): ?Contact{
        $model = ContactModel::query()->find($id->value());

        return $model ? $this->mapper->toEntity($model) : null;
    }    


    public function create(Contact $contact): Contact{
        $model = ContactModel::query()->create($this->mapper->toModelData($contact));

        return $contact->withId(new ContactId($model->id));

    }

    public function update(Contact $contact): Contact{
        $id = $contact->id();

        if(!$id){
            throw new \InvalidArgumentException('Cannot update contact without id.');

        }

        $model = ContactModel::query()->find($id->value());

        if(!$model){
            throw new ContactNotFound("Contact {$id->value()} not found");

        }
        
        $model->update($this->mapper->toModelData($contact));

        return $contact;

    }

    public function delete(ContactId $id): void{

        $deleted = ContactModel::query()->whereKey($id->value())->delete();
    


    //   for stricter version
        // if($deleted === 0) throw new ContactNotFound("Contact {$id->value()} not found.");


        

    }


}