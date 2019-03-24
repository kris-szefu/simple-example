<?php

use Money\Money;
use Money\Currency;
use PHPUnit\Framework\TestCase;
use SimpleExampleApp\Domain\ItemPrice;
use SimpleExampleApp\Domain\PricesRepositoryInterface;
use SimpleExampleApp\Domain\PricesContext;

class PricesrepostioryTest extends TestCase
{
    private $itemPrice = 17;

    /**
     * @dataProvider itemsProvider
     */
    public function testProperGetPrice(int $itemId, string $countryCode)
    {
        $expected = [
            'itemId' => $itemId,
            'price' => 17,
            'currency' => $countryCode,
        ];
        $repostioryProhpecy = $this->setupRepositoryProphecy($itemId, $countryCode);
        $controller = new PricesContext($repostioryProhpecy);

        $returned = $controller->getItemPrice($itemId, $countryCode);

        $this->assertEquals($expected, $returned, 'Wrong content');
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

    private function setupRepositoryProphecy(int $itemId, string $countryCode)
    {
        $price = new Money($this->itemPrice, new Currency($countryCode));
        $itemPrice = new ItemPrice($itemId, $price);
        $repostiory = $this->prophesize(PricesRepositoryInterface::class);
        $repostiory->getItemPriceByCountry($itemId, $countryCode)->willReturn($itemPrice)->shouldBeCalled();

        return $repostiory->reveal();
    }
}
