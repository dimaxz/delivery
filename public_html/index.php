<?php

use Delivery\Infrastructure\Repositories\AddressRepository;
use Delivery\Infrastructure\Repositories\ProductRepository;
use Delivery\Infrastructure\Repositories\DeliveryRepository;
use Delivery\Application\DeliveryCalculateService;

define('BASEPATH', realpath(dirname(__FILE__).'/../'));

include_once '../vendor/autoload.php';

$controller = new \Delivery\Presentation\Controllers\HomeController(
    new DeliveryCalculateService(
        new ProductRepository(),
        new DeliveryRepository(),
        new AddressRepository
    )
);

if(isset($_POST['submit'])){
    echo $controller->calculate($_POST);
}
else{
    echo $controller->index();
}

