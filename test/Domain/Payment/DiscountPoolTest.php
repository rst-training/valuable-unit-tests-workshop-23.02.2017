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
        $discountPool = new DiscountPool([]);
        $seat = new Seat('type1', 20);


        $this->assertEquals(2000, $discountPool->calculate($seat, 100));
    }

    /**
     * @test
     */
    public function returns_discounted_price_if_seat_type_is_in_pool()
    {
        $discountPool = new DiscountPool([
            'type1' => [
                'quantity' => 20,
                'discount' => 50,
            ]
        ]);
        $seat = new Seat('type1', 20);


        $this->assertEquals(1000, $discountPool->calculate($seat, 100));
    }
}
