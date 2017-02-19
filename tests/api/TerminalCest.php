<?php


class TerminalCest
{
    // tests
    protected $endpoint = 'total-sum?order=';

    public function getTotalSumAssertOne(ApiTester $I)
    {
        $I->wantTo('Scan these items in this order: ABCDABA. Verify the total price is $13.25');
        $I->sendGET($this->endpoint . 'ABCDABA');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->expect('Verify the total price is $13.25.');
        $I->seeResponseContainsJson(["total_sum" => "$13.25"]);
    }

    public function getTotalSumAssertTwo(ApiTester $I)
    {
        $I->wantTo('Scan these items in this order: CCCCCCC. Verify the total price is $6');
        $I->sendGET($this->endpoint . 'CCCCCCC');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->expect('Verify the total price is $6.');
        $I->seeResponseContainsJson(["total_sum" => "$6"]);
    }

    public function getTotalSumAssertThree(ApiTester $I)
    {
        $I->wantTo('Scan these items in this order: ABCD. Verify the total price is $7.25');
        $I->sendGET($this->endpoint . 'ABCD');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->expect('Verify the total price is $7.25.');
        $I->seeResponseContainsJson(["total_sum" => "$7.25"]);
    }
}
