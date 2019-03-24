<?php

namespace SimpleExampleApp\Domain;

/**
 * Interface describing what are domain actions for item - prices.
 */
interface PricesContextInterface
{
    /**
     * Gets item price in country currency.
     *
     * @param int    $itemId
     * @param string $countryCode
     *
     * @return array
     */
    public function getItemPrice(int $itemId, string $countryCode): array;
}
