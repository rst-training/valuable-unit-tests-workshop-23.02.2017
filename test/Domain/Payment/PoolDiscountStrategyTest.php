<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountPoolRepository;
use RstGroup\ConferenceSystem\Domain\Payment\PoolDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returns_discount_equal_to_zero_if_discount_pool_is_empty()
    {
        $discountPoolRepository = $this->getMock(DiscountPoolRepository::class);
        $discountPoolRepository->expects($this->any())->method('getNumberOfDiscounts')->willReturn(0);
        $discountPoolRepository->expects($this->any())->method('getDiscountPerSeat')->willReturn(13);
        $poolDiscountStrategy = new PoolDiscountStrategy($discountPoolRepository);
        $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();

        $discount = $poolDiscountStrategy->calculate($seat);

        $this->assertSame(0, $discount);
    }

    /**
     * @test
     */
    public function returns_discount_per_seat_multiplied_by_number_of_seats_when_there_are_enough_discounts()
    {
        $numberOfSeats = 7;
        $discountPerSeat = 12;
        $discountPoolRepository = $this->getMock(DiscountPoolRepository::class);
        $discountPoolRepository->expects($this->any())->method('getNumberOfDiscounts')->willReturn($numberOfSeats);
        $discountPoolRepository->expects($this->any())->method('getDiscountPerSeat')->willReturn($discountPerSeat);
        $poolDiscountStrategy = new PoolDiscountStrategy($discountPoolRepository);
        $seat = new Seat("Regular", $numberOfSeats);

        $discount = $poolDiscountStrategy->calculate($seat);

        $this->assertEquals(84, $discount);
    }
}
