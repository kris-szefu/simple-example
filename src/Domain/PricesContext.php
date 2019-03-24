<?php

namespace SimpleExampleApp\Domain;

/**
 * Class representing domain actions for item prices.
 */
class PricesContext implements PricesContextInterface
{
    /**
     * Prices repository.
     *
     * @var PricesRepositoryInterface
     */
    private $repository;

    /**
     * Prices context constructor.
     *
     * @param PricesRepositoryInterface $repository
     */
    public function __construct(PricesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getItemPrice(int $itemId, string $countryCode): array
    {
        $itemPrice = $this->repository->getItemPriceByCountry($itemId, $countryCode);

        return $itemPrice->jsonSerialize();
    }
}
