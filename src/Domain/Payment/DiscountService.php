<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

class DiscountService
{
    /**
     * @var SeatsStrategyConfiguration
     */
    private $configuration;

    /**
     * @var DiscountStrategyCollection
     */
    private $strategiesCollection;

    public function __construct(SeatsStrategyConfiguration $configuration,DiscountStrategyCollection $strategiesCollection)
    {
        $this->configuration = $configuration;
        $this->strategiesCollection = $strategiesCollection;
    }

    public function calculateForSeat($seat, $price)
    {
        $discountedPrice = null;

        foreach ($this->strategiesCollection->getAll() as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }
}
