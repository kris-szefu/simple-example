<?php

namespace SimpleExampleApp\Infrastructure;

use Money\Money;
use Money\Currency;
use SimpleExampleApp\Domain\ItemPrice;
use SimpleExampleApp\Domain\PricesRepositoryInterface;

/**
 * Prices repository returning random price.
 */
class RandomPricesRepository implements PricesRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * There is no error thrown as it is mock repository.
     */
    public function getItemPriceByCountry(int $itemId, string $countryCode): ItemPrice
    {
        $randomValue = rand(1, 999);
        $price = new Money($randomValue, new Currency($countryCode));

        return new ItemPrice($itemId, $price);
    }
}
