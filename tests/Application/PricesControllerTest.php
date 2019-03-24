<?php

use PHPUnit\Framework\TestCase;
use SimpleExampleApp\Application\PricesController;

class PricesControllerTest extends TestCase
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
        $expectedCode = 200;
        $controller = new PricesController();

        $response = $controller->getItemPrice($itemId, $countryCode);

        $this->assertEquals($expectedCode, $response->getStatusCode(), 'Wrong Code');
        $this->assertEquals(
            json_encode($expectedResponse),
            $response->getContent(),
            'Wrong content'
        );
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
