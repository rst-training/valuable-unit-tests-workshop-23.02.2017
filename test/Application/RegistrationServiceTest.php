<?php

use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Reservation;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationId;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;


class RegistrationServiceTest extends PHPUnit_Framework_TestCase
{
    public function includes_discount_in_conference_total_cost () {
        //given

        $seats = new SeatsCollection();


        $totalCost = 100;



        $conferenceSeatsDao = $this->getMock(ConferenceSeatsDao::class);
        $discountService = $this->getMock(DiscountService::class)->method('calculateForSeat')->willReturn(100);

        $costCalculationService = new CostCalculationService($conferenceSeatsDao, $discountService);

        //when

        $calculatedCosts = $costCalculationService->getTotalCost($seats);

        //then
        $this->assertEquals($calculatedCosts, $totalCost);



    }
}
