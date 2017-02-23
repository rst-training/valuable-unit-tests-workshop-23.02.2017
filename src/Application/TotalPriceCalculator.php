<?php

namespace RstGroup\ConferenceSystem\Application;

class TotalPriceCalculator
{
    protected $reservation;

    protected $conferenceDao;

    protected $discountService;

    public function __construct($reservation, $conferenceDao, $discountService)
    {
        $this->reservation = $reservation;
        $this->conferenceDao = $conferenceDao;
        $this->discountService = $discountService;
    }

    public function calculate()
    {
        return 0.0;
    }
}