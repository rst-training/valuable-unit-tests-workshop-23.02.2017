<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use Litipk\BigNumbers\Decimal;
use RstGroup\ConferenceSystem\Domain\Payment\Currency;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountPoolRepository;
use RstGroup\ConferenceSystem\Domain\Payment\Money;
use RstGroup\ConferenceSystem\Domain\Payment\PoolDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param Money $discount
     * @param Money $other
     * @return bool
     */
    private function assertDiscountEquals(Money $discount, Money $other)
    {
        $this->assertTrue($discount->getAmount()->equals($other->getAmount()));
        $this->assertEquals($discount->getCurrency(), $other->getCurrency());
    }

    /**
     * @test
     */
    public function returns_discount_equal_to_zero_if_discount_pool_is_empty()
    {
        $seatQuantity = 50;
        $conferenceId = new ConferenceId(7);
        $discountPoolRepository = $this->getMock(DiscountPoolRepository::class);
        $discountPoolRepository->method('getNumberOfDiscounts')->willReturn(0);
        $discountPoolRepository->method('getDiscountPerSeat')->willReturn(
            new Money(
                Decimal::fromInteger(13),
                new Currency("PLN")
            )
        );
        $poolDiscountStrategy = new PoolDiscountStrategy($conferenceId, $discountPoolRepository);
        $seat = new Seat("Regular", $seatQuantity);

        $discount = $poolDiscountStrategy->calculate($seat);

        $expectedDiscount = new Money(
            Decimal::fromInteger(0),
            new Currency("PLN")
        );
        $this->assertDiscountEquals($expectedDiscount, $discount);
    }

    /**
     * @test
     */
    public function returns_discount_per_seat_multiplied_by_number_of_seats_when_there_are_enough_discounts()
    {
        $conferenceId = new ConferenceId(3);
        $numberOfSeats = 7;
        $discountPoolRepository = $this->getMock(DiscountPoolRepository::class);
        $discountPoolRepository->method('getNumberOfDiscounts')->willReturn($numberOfSeats);
        $discountPoolRepository->method('getDiscountPerSeat')->willReturn(
            new Money(
                Decimal::fromInteger(12),
                new Currency("PLN")
            )
        );
        $poolDiscountStrategy = new PoolDiscountStrategy($conferenceId, $discountPoolRepository);
        $seat = new Seat("Regular", $numberOfSeats);

        $discount = $poolDiscountStrategy->calculate($seat);

        $expectedDiscount = new Money(
            Decimal::fromInteger(84),
            new Currency("PLN")
        );
        $this->assertDiscountEquals($expectedDiscount, $discount);
    }
}
