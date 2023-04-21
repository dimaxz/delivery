<?php

namespace Delivery\Domain\Delivery;

class DeliveryEntity
{

    public function __construct(private int $id, private string $name, private string $gateway)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getGateway(): string
    {
        return $this->gateway;
    }


}