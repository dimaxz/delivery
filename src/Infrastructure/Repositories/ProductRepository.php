<?php declare(strict_types=1);

namespace Delivery\Infrastructure\Repositories;

use Delivery\Domain\Product\ProductEntity;

class ProductRepository
{

    public function findAll(): array
    {
        return [
            new ProductEntity(
                id: 1,
                name: 'Пуховик',
                weight: 1200,
                price: 21000,
                amount: 2
            ),
            new ProductEntity(
                id: 2,
                name: 'Джинсы',
                weight: 800,
                price: 4200,
                amount: 1
            )
        ];
    }

    public function findById(int $id): ?ProductEntity
    {
        foreach ($this->findAll() as $entity){
            if($entity->getId() === $id){
                return $entity;
            }
        }
        return null;
    }

}