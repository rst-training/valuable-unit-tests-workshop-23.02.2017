<?php
namespace RstGroup\ConferenceSystem\Application\Test;


use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsAvailabilityCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;


class RegistrationServiceTest extends \PHPUnit_Framework_TestCase
{

    public function test ()
    {
        $this->assertFalse(false);
    }
//    public function testShouldCalculateTotalCostOfReservationWithDiscount()
//    {
//        //given orderId
//        $totalValue = 100;
//        $orderId = 1;
//        //and conference id
//        $conferenceId = 3;
//        //and conference
//        $seatsAvailible = new SeatsAvailabilityCollection();
//        $seatsAvailible->set(1,2);
//        $reservationCollection = new ReservationsCollection();
//        $conferenceId = new Conference(new ConferenceId($conferenceId),$seatsAvailible,$reservationCollection);
//        $paypalPayments = $this->getMockBuilder(PaypalPayments::class)
//            ->getMock();
//
//
//        $reqistrationService = $this->getMockBuilder(RegistrationService::class)
//        ->getMock();
//
//        $reqistrationService->method('getPaypalPayments')
//            ->will($paypalPayments);
//
//        //expected paypal payments bulid link with correct total value
//        $paypalPayments->expects($this->once())->method('getApprovalLink')
//                ->with($conferenceId,$totalValue);
//
//        //when confirm order
//        $reqistrationService->
///   }

}
