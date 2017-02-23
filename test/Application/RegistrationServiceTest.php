<?php

namespace RstGroup\ConferenceSystem\Application;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;

class RegistrationServiceTest extends \PHPUnit_Framework_TestCase
{
    public function test_order_is_confirmed_and_total_cost_have_discount_applied()
    {
        $registrationService = $this->getMockBuilder(RegistrationService::class)
            ->setMethods(['getConferenceRepository', 'getConferenceDao', 'getDiscountService' , 'getPaypalPayments'])
            ->getMock();

        $conferenceRepositoryMock = $this->getMock(ConferenceMemoryRepository::class);
        $conferenceDaoMock = $this->getMock(ConferenceSeatsDao::class);
        $discountServiceMock = $this->getMock(DiscountService::class);
        $payPalServiceMock = $this->getMock(PaypalPayments::class);

        $discountPrice = 20;
        $seatsPrices = [
            'A' => 10,
            'B' => 30
        ];
        $totalPrice = 30;

        $paypalPaymentsMock = $this->getMock(PaypalPayments::class);
        $paypalPaymentsMock->expects($this->once())
            ->method('getApprovalLink')
            ->with($totalPrice, $conferenceMock)
            ->willReturn('http://localhost');

        $registrationService->confirmOrder(1, 1);
    }
}