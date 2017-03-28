<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

interface DiscountPoolRepository
{
    /**
     * @param Seat $seat
     * @return int
     */
    public function getNumberOfDiscounts(Seat $seat);

    /**
     * @param Seat $seat
     * @return mixed
     */
    public function getDiscountPerSeat(Seat $seat);
}