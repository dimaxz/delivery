<?php

namespace Delivery\Infrastructure\Deliveries;

class OzonGateWay implements DeliveryGateWayInterface
{


    public function calculate(string $from, string $to, float $weight): CalculateResult
    {
        $res = $this->curlPost([
            'sourceKladr' => $from,
            'targetKladr' => $to,
            'weight' => $weight
        ]);
        $date = new \DateTime();
        $date->add(new \DateInterval("P".$res['period']."D"));
        return new CalculateResult(
            price: (float)$res['price'],
            date: $date,
            error: $res['error']
        );
    }

    private function curlPost(array $data): array
    {
        $price = 0.5;
        $data = '{
"price": ' . round($price * $data['weight']) . ',
"period": '.rand(4,10).',
"error": ""
}';
        return json_decode($data, true);
    }
}