<?php

namespace Delivery\Infrastructure\Deliveries;

class CalculateResult
{

    public function __construct(private float $price, private \DateTime $date,private ?string $error)
    {
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

}