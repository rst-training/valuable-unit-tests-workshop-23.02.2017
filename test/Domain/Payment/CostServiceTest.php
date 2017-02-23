<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use RstGroup\ConferenceSystem\Domain\Payment\CostService;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;

class CostServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnTotalCostOfSeatsBasedOnGivenSeatPricesAndDiscountService()
    {
        $discountService = $this->getMockBuilder(DiscountService::class)->disableOriginalConstructor()->getMock();
        $discountService->method('calculateForSeat')->willReturn(100);

        $costService = new CostService($discountService);
    }
}
