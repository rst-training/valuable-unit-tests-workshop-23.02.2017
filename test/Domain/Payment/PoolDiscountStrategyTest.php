<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use RstGroup\ConferenceSystem\Domain\Payment\PoolDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returns_the_original_price_if_discount_pool_is_empty()
    {
        $poolDiscountStrategy = new PoolDiscountStrategy();
        $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();
        $originalPrice = 53;

        $discount = $poolDiscountStrategy->calculate($seat, $originalPrice);

        $this->assertSame(0, $discount);
    }
}
