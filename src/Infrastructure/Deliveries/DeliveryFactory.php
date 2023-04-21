<?php

namespace Delivery\Infrastructure\Deliveries;

class DeliveryFactory
{

    public static function build(string $name): DeliveryGateWayInterface
    {
        switch ($name) {
            case 'sdek':
                $gateway = new SdekGateWay();
                break;
            case 'ozon':
                $gateway = new OzonGateWay();
                break;

            default:
                throw new \RuntimeException('gateway ' . $name . ' not implemented');
        }

        return $gateway;
    }

}