<?php

namespace RstGroup\ConferenceSystem\Application;

use RstGroup\ConferenceSystem\Domain\Reservation\Reservation;

class TotalPriceCalculator
{
    /** @var Reservation */
    protected $reservation;

    protected $conferenceDao;

    protected $discountService;

    public function __construct($reservation, $conferenceDao, $discountService)
    {
        $this->reservation = $reservation;
        $this->conferenceDao = $conferenceDao;
        $this->discountService = $discountService;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @return mixed
     */
    public function getConferenceDao()
    {
        return $this->conferenceDao;
    }

    /**
     * @return mixed
     */
    public function getDiscountService()
    {
        return $this->discountService;
    }

    public function calculate($conferenceId)
    {
        $totalCost = 0;
        $seats = $this->reservation->getSeats();
        $seatsPrices = $this->getConferenceDao()->getSeatsPrices($conferenceId);

        foreach ($seats->getAll() as $seat) {
            $priceForSeat = $seatsPrices[$seat->getType()][0];

            $dicountedPrice = $this->getDiscountService()->calculateForSeat($seat, $priceForSeat);
            $regularPrice = $priceForSeat * $seat->getQuantity();

            $totalCost += min($dicountedPrice, $regularPrice);
        }

        return $totalCost;
    }
}