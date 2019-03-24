<?php

namespace SimpleExampleApp\Domain;

class PricesContext implements PricesContextInterface
{
    /**
     * {@inheritdoc}
     */
    public function getItemPrice(int $itemId, string $countryCode): array
    {
        return [
            'itemId' => $itemId,
            'countryCode' => $countryCode,
            'price' => 17,
            'currency' => 'Onions',
        ];
    }
}
