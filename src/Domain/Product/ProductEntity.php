<?php declare(strict_types=1);

namespace Delivery\Domain\Product;

class ProductEntity
{

    public function __construct(private int $id, private string $name, private float $weight,private float $price,private int $amount)
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
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

}