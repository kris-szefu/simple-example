<?php

use PHPUnit\Framework\TestCase;
use SimpleExampleApp\Infrastructure\RandomPricesRepository;

class RandomPricesRepositoryTest extends TestCase
{
    private $itemId = 17;
    private $currency = 'PL';

    public function testProperGetPrice()
    {
        $repository = new RandomPricesRepository();

        $returned = $repository->getItemPriceByCountry($this->itemId, $this->currency);
        $returned = $returned->jsonSerialize();

        $this->assertEquals($this->itemId, $returned['itemId'], 'Wrong id');
        $this->assertEquals($this->currency, $returned['currency'], 'Wrong currency');
    }
}
