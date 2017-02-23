<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountService implements DiscountServiceInterface
{
    /**
     * @var SeatsStrategyConfiguration
     */
    private $configuration;

    public function __construct(SeatsStrategyConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function calculateForSeat(Seat $seat, $price)
    {
        $discountedPrice = null;

        foreach ($this->seatDiscountStrategies() as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }

    protected function seatDiscountStrategies()
    {
       return [
           new AtLeastTenEarlyBirdSeatsDiscountStrategy($this->configuration),
           new FreeSeatDiscountStrategy($this->configuration),
       ];
    }
}
