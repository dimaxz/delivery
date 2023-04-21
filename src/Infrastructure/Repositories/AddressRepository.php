<?php

namespace Delivery\Infrastructure\Repositories;

use Delivery\Domain\Address\AddressEntity;

class AddressRepository
{

    public function findAll(): array
    {
        return [
            new AddressEntity(
                id: 1,
                address: 'г.Москва, ул. Производственная 1, кв.1',
            ),
            new AddressEntity(
                id: 2,
                address: 'г.Киров, ул. Попова 61, кв.2'
            )
        ];
    }

    public function findById(int $id): ?AddressEntity
    {
        foreach ($this->findAll() as $entity){
            if($entity->getId() === $id){
                return $entity;
            }
        }
        return null;
    }
}