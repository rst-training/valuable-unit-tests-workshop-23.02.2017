<?php


namespace RstGroup\ConferenceSystem\Domain\Payment\Test;


use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountStrategyCollection;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
//    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
//    {
//
//        $discountService = new DiscountService($configuration);
//        $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();
//
//        $configuration->expects($this->at(0))->method('isEnabledForSeat')->with(AtLeastTenEarlyBirdSeatsDiscountStrategy::class)->willReturn(true);
//        $configuration->expects($this->at(1))->method('isEnabledForSeat')->with(FreeSeatDiscountStrategy::class)->willReturn(false);
//        $seat->expects($this->exactly(2))->method('getQuantity')->willReturn(10);
//
//        $this->assertEquals(59.5, $discountService->calculateForSeat($seat, 7), 0.01);
//    }

    public function testShouldReturnDiscountedPriceWhenGivenDiscountStrategyDiscountedPrice()
    {
        $expectedPrice = 3;
        //given seat
        $seat = new Seat('test', 10);
        // and seat Price
        $price = 7;

        $configuration = $this->getMock(SeatsStrategyConfiguration::class);

        // and  discounted stategy for service
        $discountStrategyMock = $this->getMockBuilder(SeatDiscountStrategy::class)
            ->getMock();
        $discountStrategyMock->method('calculate')
            ->with($seat,$price,null)
            ->willReturn($expectedPrice);

        $discountStrategiesCollection = $this->getMock(DiscountStrategyCollection::class);

        $discountStrategiesCollection->method('getAll')
            ->willReturn([$discountStrategyMock]);

        $discountService = new DiscountService($configuration, $discountStrategiesCollection);

        //when calculate discount for seat
        $returnPrice = $discountService->calculateForSeat($seat, $price);


        //then price is discounted
        $this->assertEquals($expectedPrice, $returnPrice);
    }

}
