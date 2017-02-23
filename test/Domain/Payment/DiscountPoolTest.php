<?php


namespace RstGroup\ConferenceSystem\Domain\Payment\Test;


use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountPool;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;


class DiscountPoolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returns_same_price_if_has_no_discounts_available_for_seat()
    {
        $discountPool = new DiscountPool();
        $seat = new Seat('type1', 20);


        $this->assertEquals(50, $discountPool->calculate($seat, 50));

//         $configuration = $this->getMock(SeatsStrategyConfiguration::class);
//         $discountService = new DiscountService($configuration);
//         $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();

//         $configuration->expects($this->at(0))->method('isEnabledForSeat')->with(AtLeastTenEarlyBirdSeatsDiscountStrategy::class)->willReturn(true);
//         $configuration->expects($this->at(1))->method('isEnabledForSeat')->with(FreeSeatDiscountStrategy::class)->willReturn(false);
//         $seat->expects($this->atLeastOnce())->method('getQuantity')->willReturn(10);

// var_dump($discountService->calculateForSeat($seat, 8));

//         $this->assertEquals(68, $discountService->calculateForSeat($seat, 8), 1);
    }
}
