<?php

use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;


class RegistrationServiceTest extends PHPUnit_Framework_TestCase
{
    public function includes_discount_in_total_cost () {
        //given

        $numberOfDiscountedSeats = 1;
        $discountedSeatPrice = 80;

        $numberOfNormalSeats = 2;
        $normalSeatPrice = 100;

        $totalCost = ($numberOfDiscountedSeats * $discountedSeatPrice) + ($numberOfNormalSeats * $normalSeatPrice);

        $orderId = 1;
        $conferenceId = 1;

        //expects

        $this->getMock(PaypalPayments::class)->expects(self::once())->method('getApprovalLink')->with($conference, $totalCost);

        //when


    }
}
