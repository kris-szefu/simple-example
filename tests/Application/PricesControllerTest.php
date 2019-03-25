<?php

use PHPUnit\Framework\TestCase;
use SimpleExampleApp\Application\PricesController;
use SimpleExampleApp\Domain\PricesContextInterface;

class PricesControllerTest extends TestCase
{
    private $itemId = 17;
    private $countryCode = 'PL';

    public function testProperGetPriceResponse()
    {
        $expectedResponse = [
            'itemId' => $this->itemId,
            'price' => 17,
            'currency' => 'Onions',
        ];
        $expectedCode = 200;
        $contextProphecy = $this->setupContextProphecy($this->itemId, $this->countryCode, $expectedResponse);
        $controller = new PricesController($contextProphecy);

        $response = $controller->getItemPrice($this->itemId, $this->countryCode);

        $this->assertEquals($expectedCode, $response->getStatusCode(), 'Wrong Code');
        $this->assertEquals(
            json_encode($expectedResponse),
            $response->getContent(),
            'Wrong content'
        );
    }

    private function setupContextProphecy(int $itemId, string $countryCode, array $mockedResponse = [])
    {
        $context = $this->prophesize(PricesContextInterface::class);
        $context->getItemPrice($itemId, $countryCode)->willReturn($mockedResponse)->shouldBeCalled();

        return $context->reveal();
    }

    public function testProperNotFoundResponse()
    {
        $expectedResponse = 'Item not found';
        $expectedCode = 404;
        $contextProphecy = $this->setupContextProphecy($this->itemId, $this->countryCode);
        $controller = new PricesController($contextProphecy);

        $response = $controller->getItemPrice($this->itemId, $this->countryCode);

        $this->assertEquals($expectedCode, $response->getStatusCode(), 'Wrong Code');
        $this->assertEquals(
            json_encode($expectedResponse),
            $response->getContent(),
            'Wrong content'
        );
    }
}
