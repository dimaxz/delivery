<?php declare(strict_types=1);

namespace Delivery\Application;

use Delivery\Infrastructure\Deliveries\CalculateResult;
use Delivery\Infrastructure\Deliveries\DeliveryFactory;
use Delivery\Infrastructure\Repositories\AddressRepository;
use Delivery\Infrastructure\Repositories\DeliveryRepository;
use Delivery\Infrastructure\Repositories\ProductRepository;

class DeliveryCalculateService
{

    public function __construct(
        private ProductRepository  $productRepository,
        private DeliveryRepository $deliveryRepository,
        private AddressRepository  $addressRepository
    )
    {
    }

    /**
     * @return ProductRepository
     */
    public function getProductRepository(): ProductRepository
    {
        return $this->productRepository;
    }

    /**
     * @return DeliveryRepository
     */
    public function getDeliveryRepository(): DeliveryRepository
    {
        return $this->deliveryRepository;
    }

    /**
     * @return AddressRepository
     */
    public function getAddressRepository(): AddressRepository
    {
        return $this->addressRepository;
    }

    public function calculateDeliverySum(int $deliveryId, int $addressFromId , int $addressToId, float $weight): CalculateResult
    {
        $delivery = $this->deliveryRepository->findById($deliveryId);
        $gateway = DeliveryFactory::build($delivery->getGateway());
        $addressFrom = $this->addressRepository->findById($addressFromId);
        $addressTo = $this->addressRepository->findById($addressToId);
        return $gateway->calculate(
            $addressFrom->getAddress(),
            $addressTo->getAddress(),
            $weight
        );
    }
}