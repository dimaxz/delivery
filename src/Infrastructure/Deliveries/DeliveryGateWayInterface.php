<?php declare(strict_types=1);

namespace Delivery\Infrastructure\Deliveries;

interface DeliveryGateWayInterface
{

    public function calculate(string $from, string $to, float $weight): CalculateResult;
}