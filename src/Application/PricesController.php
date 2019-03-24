<?php

namespace SimpleExampleApp\Application;

use Symfony\Component\HttpFoundation\JsonResponse;

class PricesController
{
    /**
     * Get item price in specific country currency.
     *
     * @param int    $itemId
     * @param string $countryCode
     *
     * @return JsonResponse
     */
    public function getItemPrice(int $itemId, string $countryCode): JsonResponse
    {
        $priceObject = [
            'itemId' => $itemId,
            'countryCode' => $countryCode,
            'price' => 17,
            'currency' => 'Onions',
        ];

        return new JsonResponse($priceObject);
    }
}
