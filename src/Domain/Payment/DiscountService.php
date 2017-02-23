<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

class DiscountService
{
    /** @var SeatDiscountStrategy */
    private $seatsStrategies = [];

    public function __construct(array $seatStrategies)
    {
        $this->seatsStrategies = $seatStrategies;
    }

    public function calculateForSeat($seat, $price)
    {
        $discountedPrice = null;

        foreach ($this->seatDiscountStrategies() as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }

    protected function seatDiscountStrategies()
    {
        return $this->seatsStrategies;
    }
}
