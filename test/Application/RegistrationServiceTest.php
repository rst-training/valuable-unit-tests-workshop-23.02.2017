<?php

namespace RstGroup\ConferenceSystem\Application;

use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;

class RegistrationServiceTest extends \PHPUnit_Framework_TestCase
{
    public function test_order_is_confirmed_and_total_cost_have_discount_applied()
    {
        $registrationService = new RegistrationService();

        $conferenceMock = $this->getMock(Conference::class);
        $conferenceRepositoryMock = $this->getMock(ConferenceMemoryRepository::class);

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