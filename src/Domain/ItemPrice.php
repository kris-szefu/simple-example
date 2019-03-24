<?php

namespace SimpleExampleApp\Domain;

use Money\Money;
use JsonSerializable;

/**
 * Domain object representing price for item.
 */
class ItemPrice implements JsonSerializable
{
    /**
     * Item id.
     *
     * @var int
     */
    private $itemId;

    /**
     * Item price.
     *
     * @var Money
     */
    private $price;

    /**
     * Item price constructor.
     *
     * @param int   $itemId
     * @param Money $price
     */
    public function __construct(int $itemId, Money $price)
    {
        $this->itemId = $itemId;
        $this->price = $price;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'itemId' => $this->itemId,
            'price' => $this->price->getAmount(),
            'currency' => $this->price->getCurrency(),
        ];
    }
}
