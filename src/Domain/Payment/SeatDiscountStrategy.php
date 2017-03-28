<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

interface SeatDiscountStrategy
{
    /**
     * @param Seat $seat
     * @return mixed discount
     */
    public function calculate(Seat $seat);
}
