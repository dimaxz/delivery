<?php declare(strict_types=1);

namespace Delivery\Presentation\Controllers;

use Delivery\Application\DeliveryCalculateService;
use Delivery\Infrastructure\Repositories\AddressRepository;
use Delivery\Infrastructure\Repositories\DeliveryRepository;
use Delivery\Infrastructure\Repositories\ProductRepository;

class HomeController extends AbstractController
{


    public function __construct(private DeliveryCalculateService $deliveryCalculateService
    )
    {
    }

    public function index(): string
    {

        $products = $this->deliveryCalculateService->getProductRepository()->findAll();
        $deliveries = $this->deliveryCalculateService->getDeliveryRepository()->findAll();
        $addresses = $this->deliveryCalculateService->getAddressRepository()->findAll();

        return $this->includeTpl('template', [
            'products' => $products,
            'deliveries' => $deliveries,
            'addresses' => $addresses,
            'delivery_sum' => 0
        ]);
    }


    public function calculate(array $post): string
    {

        $products = $this->deliveryCalculateService->getProductRepository()->findAll();
        $deliveries = $this->deliveryCalculateService->getDeliveryRepository()->findAll();
        $addresses = $this->deliveryCalculateService->getAddressRepository()->findAll();
        $deliverySum = 0;
        $deliveryComment = '';
        if ($post['delivery'] > 0) {
            $weight = 0;
            foreach ($products as $product) {
                $weight += $product->getWeight();
            }

            $calculateResult = $this->deliveryCalculateService->calculateDeliverySum(
                (int)$post['delivery'],
                (int)$post['address_from'],
                (int)$post['address_to'],
                $weight
            );
            $deliverySum = $calculateResult->getPrice();
            $deliveryComment = $calculateResult->getError() > ''?$calculateResult->getError(): 'Срок доставки: '.
                $calculateResult->getDate()->format('Y.m.d');
        }

        return $this->includeTpl('template', [
            'products' => $products,
            'deliveries' => $deliveries,
            'addresses' => $addresses,
            'delivery_sum' => $deliverySum,
            'delivery_select' => (int)$post['delivery'],
            'address_from_select' => (int)$post['address_from'],
            'address_to_select' => (int)$post['address_to'],
            'delivery_comment' => $deliveryComment
        ]);
    }

}