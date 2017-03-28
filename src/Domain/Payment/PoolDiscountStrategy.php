<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategy implements SeatDiscountStrategy
{
    private $discountPoolRepository;

    public function __construct(DiscountPoolRepository $discountPoolRepository)
    {
        $this->discountPoolRepository = $discountPoolRepository;
    }

    /**
     * @param Seat $seat
     * @return mixed discount
     */
    public function calculate(Seat $seat)
    {
        return $this->discountPoolRepository->getNumberOfDiscounts($seat) *
            $this->discountPoolRepository->getDiscountPerSeat($seat);
    }
}