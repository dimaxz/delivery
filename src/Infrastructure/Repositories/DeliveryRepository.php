<?php declare(strict_types=1);

namespace Delivery\Infrastructure\Repositories;

use Delivery\Domain\Delivery\DeliveryEntity;

class DeliveryRepository
{

    public function findAll(): array
    {
        return [
            new DeliveryEntity(
                id: 1,
                name: '«Быстрая доставка»',
                gateway: 'ozon'
            ),
            new DeliveryEntity(
                id: 2,
                name: '«Медленная доставка»: имеет базовую стоимость 150р',
                gateway: 'sdek'
            )
        ];
    }

    public function findById(int $id): ?DeliveryEntity
    {
        foreach ($this->findAll() as $entity){
            if($entity->getId() === $id){
                return $entity;
            }
        }
        return null;
    }
}