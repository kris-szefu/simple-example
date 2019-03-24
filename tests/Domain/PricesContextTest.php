<?php

use PHPUnit\Framework\TestCase;
use SimpleExampleApp\Domain\PricesContext;

class PricesContextTest extends TestCase
{
    /**
     * @dataProvider itemsProvider
     */
    public function testProperGetPriceResponse(int $itemId, string $countryCode)
    {
        $expectedResponse = [
            'itemId' => $itemId,
            'countryCode' => $countryCode,
            'price' => 17,
            'currency' => 'Onions',
        ];
        $controller = new PricesContext();

        $response = $controller->getItemPrice($itemId, $countryCode);

        $this->assertEquals($expectedResponse, $response, 'Wrong content');
    }

    /**
     * Item prices case provider.
     * Example: itemId, countryCode.
     */
    public function itemsProvider()
    {
        return [
            [12, 'DE'],
            [17, 'DE'],
            [1, 'ZA'],
            [21, 'PL'],
        ];
    }
}
