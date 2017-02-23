<?php


namespace RstGroup\ConferenceSystem\Domain\Payment\Test;


use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnPriceDiscountedBy15PercentIfAtLeast10EarlyBirdSeatsAreBought()
    {
        $configuration = $this->getMock(SeatsStrategyConfiguration::class);
        $seat = new Seat('Test seat', 10);

        $configuration->method('isEnabledForSeat')->withAnyParameters(AtLeastTenEarlyBirdSeatsDiscountStrategy::class, $seat)->willReturn(true);

        $discountService = new DiscountService($configuration);
        $this->assertEquals(85, $discountService->calculateForSeat($seat, 10));
    }
}
