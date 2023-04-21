<?php declare(strict_types=1);

namespace Delivery\Domain\Address;

class AddressEntity
{

    public function __construct(private int $id, private string $address)
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
    public function getAddress(): string
    {
        return $this->address;
    }

}