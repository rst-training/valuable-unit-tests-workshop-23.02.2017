<?php

class TotalCostService {
    private $discountService;
    private $daoService;

    public function __construct(DiscountService $discountService, ConferenceSeatsDao $daoService) {
        $this->discountService = $discountService;
        $this->$daoService = $daoService;
    }

    /**
     *
     */
    public function calculateTotalCost($seats) {
        foreach ($seats as $seat) {
            $priceForSeat = $this->getPriceForSeat($seat);
        }
    }
}
