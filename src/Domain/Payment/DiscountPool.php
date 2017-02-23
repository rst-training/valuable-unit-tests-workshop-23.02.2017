<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountPool
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function calculate(Seat $seat, $price)
    {
        if (isset($this->config[$seat->getType()])) {
            return $seat->getQuantity() * ($price - $this->config[$seat->getType()]['discount']);
        }

        return $seat->getQuantity() * $price;
    }
}