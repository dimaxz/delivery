<?php

namespace Delivery\Infrastructure\Deliveries;

class SdekGateWay implements DeliveryGateWayInterface
{

    public function calculate(string $from, string $to, float $weight): CalculateResult
    {
        $res = $this->curlPost([
            'sourceKladr' => $from,
            'targetKladr' => $to,
            'weight' => $weight
        ]);

        $date = new \DateTime($res['date']);

        return new CalculateResult(
            price: 150 * $res['coefficient'],
            date: $date,
            error: $res['error']
        );
    }

    private function curlPost(array $data): array
    {

        $data = '{
"coefficient": ' . rand(10,15). ',
"date": "2023-05-'.rand(4,10).'",
"error": ""
}';
        return json_decode($data, true);
    }

}