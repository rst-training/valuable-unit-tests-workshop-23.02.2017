<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

class DiscountService
{
    /**
     * @var SeatsStrategyConfiguration
     */
    private $seatDiscountStrategies;

    public function __construct($seatDiscountStrategies)
    {
        $this->seatDiscountStrategies = $seatDiscountStrategies;
    }

    public function calculateForSeat($seat, $price)
    {
        $discountedPrice = null;

        foreach ($this->seatDiscountStrategies as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }
}
