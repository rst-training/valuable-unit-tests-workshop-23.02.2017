<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategy implements SeatDiscountStrategy
{
    /**
     * @param $seat
     * @param $price
     * @return mixed discount
     */
    public function calculate(Seat $seat, $price)
    {
        return 0;
    }
}