<?php

namespace SimpleExampleApp\Domain;

/**
 * Prices repository interface.
 */
interface PricesRepositoryInterface
{
    /**
     * Gets item price in country currency.
     *
     * @param int    $itemId
     * @param string $countryCode
     *
     * @throws ItemNotFoundException
     *
     * @return ItemPrice
     */
    public function getItemPriceByCountry(int $itemId, string $countryCode): ItemPrice;
}
