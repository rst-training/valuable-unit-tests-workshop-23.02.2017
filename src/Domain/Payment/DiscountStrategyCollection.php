<?php
namespace RstGroup\ConferenceSystem\Domain\Payment;

class DiscountStrategyCollection
{
    /**
     * @var SeatDiscountStrategy[]
     */
    protected $stategys;

    public function add(SeatDiscountStrategy $strategy)
    {
        $this->stategys[] = $strategy;
    }

    public function getAll()
    {
        return $this->stategys;
    }
}
