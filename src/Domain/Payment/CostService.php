<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

class CostService
{
    public function __construct(DiscountServiceInterface $discountService)
    {
        $this->discountService = $discountService;
    }
}