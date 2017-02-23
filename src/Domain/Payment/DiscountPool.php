<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountPool
{


    public function calculate(Seat $seat, $price)
    {
        return $price;
    }
}