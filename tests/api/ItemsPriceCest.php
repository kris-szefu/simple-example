<?php

use Codeception\Example;

class ItemsPriceCest
{
    /**
     * @example {"itemId": 14, "countryCode": "PL"}
     * @example {"itemId": 13, "countryCode": "DE"}
     * @example {"itemId": -1, "countryCode": "ZA"}
     */
    public function checkProperResponse(ApiTester $I, Example $example)
    {
        $expectedResponse = $this->prepareExpectedProperResponse($example['itemId'], $example['countryCode']);

        $I->sendGET("/items/{$example['itemId']}/price/{$example['countryCode']}/");
        $response = json_decode($I->grabResponse());

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->assertEquals($expectedResponse['itemId'], $response->itemId);
        $I->assertEquals($expectedResponse['currency'], $response->currency);
        $I->assertTrue(is_numeric($response->price));
    }

    private function prepareExpectedProperResponse(int $itemId, string $countryCode)
    {
        return [
            'itemId' => $itemId,
            'currency' => $countryCode,
        ];
    }
}
