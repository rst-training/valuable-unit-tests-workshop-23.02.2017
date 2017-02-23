<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

interface DiscountServiceInterface
{
    public function calculateForSeat(Seat $seat, $price);
}
