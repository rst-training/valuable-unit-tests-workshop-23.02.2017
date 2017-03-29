<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;


use Litipk\BigNumbers\Decimal;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class PoolDiscountStrategy implements SeatDiscountStrategy
{
    private $discountPoolRepository;
    private $conferenceId;

    /**
     * @param ConferenceId $conferenceId
     * @param DiscountPoolRepository $discountPoolRepository
     */
    public function __construct(ConferenceId $conferenceId, DiscountPoolRepository $discountPoolRepository)
    {
        $this->conferenceId = $conferenceId;
        $this->discountPoolRepository = $discountPoolRepository;
    }

    /**
     * @param Seat $seat
     * @return Money discount
     */
    public function calculate(Seat $seat)
    {
        $discountPerSeat = $this->discountPoolRepository->getDiscountPerSeat($this->conferenceId, $seat);
        $discountCurrency = $discountPerSeat->getCurrency();
        $discountAmount = $discountPerSeat->getAmount()->mul(
            Decimal::fromInteger($this->discountPoolRepository->getNumberOfDiscounts($this->conferenceId, $seat))
        );

        return new Money($discountAmount, $discountCurrency);
    }
}