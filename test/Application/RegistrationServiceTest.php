<?php

use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Reservation\OrderId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationId;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;
// use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;
// use Symfony\Component\HttpFoundation\RedirectResponse;


// class RegistrationServiceTest extends \PHPUnit_Framework_TestCase {
//     public function gets_discount_for_every_seat_in_reservation_linked_with_provided_orderid()
//     {
//         $conferenceId = new ConferenceId('123abc')

//         $discountServiceMock = $this->getMock(DiscountService::class)
//                                     ->will
//     }

//     public function sends_calculated_total_cost_to_paypal_service()
//     {

//         $expectedTotalCost = 9000;
//         $conference = new Co

//         $paypalServiceMock = $this->getMockBuilder(PaypalPayments::class)
//                          ->setMethods(['getApprovalLink'])
//                          ->getMock();
//         $paypalServiceMock.expects($this->once())
//             ->method('getApprovalLink')
//             ->with($this->equalTo($conference), $this->equalTo($expectedTotalCost))
//     }
// }
