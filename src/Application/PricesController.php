<?php

namespace SimpleExampleApp\Application;

use Symfony\Component\HttpFoundation\JsonResponse;
use SimpleExampleApp\Domain\PricesContextInterface;

/**
 * Controller for item - prices operations.
 */
class PricesController
{
    /**
     * Prices context.
     *
     * @var PricesContextInterface
     */
    private $context;

    /**
     * Prices Controller constructor.
     *
     * @param PricesContextInterface $context
     */
    public function __construct(PricesContextInterface $context)
    {
        $this->context = $context;
    }

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
        $priceObject = $this->context->getItemPrice($itemId, $countryCode);

        return new JsonResponse($priceObject);
    }
}
