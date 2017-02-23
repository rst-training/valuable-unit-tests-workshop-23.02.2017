<?php

namespace RstGroup\ConferenceSystem\Application;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Reservation\Reservation;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;

class TotalPriceCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function test_calculate_total_cost_for_two_seats_one_with_discount_should_return_price_with_discount()
    {
        $reservationMock = $this->getMockBuilder(Reservation::class)
            ->disableOriginalConstructor()->getMock();
        $conferenceDao = $this->getMockBuilder(ConferenceSeatsDao::class)
            ->disableOriginalConstructor()->getMock();
        $discountService = $this->getMockBuilder(DiscountService::class)
            ->disableOriginalConstructor()->getMock();

        $seatsCollection = new SeatsCollection();
        $seatsCollection->add(new Seat('foo', 1));
        $seatsCollection->add(new Seat('bar', 1));

        $reservationMock->expects($this->once())
            ->method('getSeats')
            ->willReturn($seatsCollection);
        $conferenceDao->expects($this->once())
            ->method('getSeatsPrices')
            ->willReturn([
                'foo' => [10],
                'bar' => [30]
            ]);
        $discountService->expects($this->any())
            ->method('calculateForSeat')
            ->willReturn(20);

        $totalPriceCalculator = new TotalPriceCalculator($reservationMock, $conferenceDao, $discountService);

        $expectedTotalCost = 30;
        $conferenceId = 1;

        $this->assertEquals($expectedTotalCost, $totalPriceCalculator->calculate($conferenceId));
    }
}