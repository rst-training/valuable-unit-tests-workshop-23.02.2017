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
    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
    {
        $seatsQuantity = 11;
        $seatPrice = 10;
        $expectedAfterDiscount = 0.85;

        $configuration = new SeatsStrategyConfiguration();
        $discountStrategies = [
           new AtLeastTenEarlyBirdSeatsDiscountStrategy($configuration),
           new FreeSeatDiscountStrategy($configuration),
       ];
        $discountService = new DiscountService($discountStrategies);
        $seat = new Seat('typ', $seatsQuantity);


        $this->assertEquals(
            $seatsQuantity * $seatPrice * $expectedAfterDiscount,
            $discountService->calculateForSeat($seat, $seatPrice),
            0.01
        );
    }
}
