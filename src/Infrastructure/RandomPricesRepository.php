<?php

namespace SimpleExampleApp\Infrastructure;

use Money\Money;
use Money\Currency;
use SimpleExampleApp\Domain\ItemPrice;
use SimpleExampleApp\Domain\PricesRepositoryInterface;
use SimpleExampleApp\Domain\EmptyCurrenctyException;

/**
 * Prices repository returning random price.
 */
class RandomPricesRepository implements PricesRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getItemPriceByCountry(int $itemId, string $countryCode): ItemPrice
    {
        if (empty($countryCode)) {
            throw new EmptyCurrenctyException();
        }

        $randomValue = rand(1, 999);
        $price = new Money($randomValue, new Currency($countryCode));

        return new ItemPrice($itemId, $price);
    }
}
