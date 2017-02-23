<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\OrderId;
use RstGroup\ConferenceSystem\Domain\Reservation\Reservation;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationAlreadyExist;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationDoesNotExist;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsAvailabilityCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;

class ConferenceTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldNotAllowCancelReservationWhenReservationIsNotForOrder()
    {

    }

    public function testShouldIncrementQuantityOfAvailabilitySeats()
    {

    }

    public function testShouldRemoveReservationWhenReservationIsForOrder()
    {

    }

    public function testShouldReturnErrorWhenReservationNotExist()
    {

    }

    public function testShouldAddReservationFromWaitListWhenSeatsAreAvailability()
    {

    }

    public function testShouldNotAddReservationFromWaitListWhenSeatsAreNotAvailability()
    {

    }


    public function testShouldCalculateTotalValueWithDiscountForOrderWhenPurchaseReservation()
    {
        $expectedTotalValue = 38;
        //given conference id
        $conferenceId = new ConferenceId(4);
        //and order id
        $orderId = new OrderId(2);
        // and availability seats list
        $seatsAvailability = new SeatsAvailabilityCollection();
        $seatsAvailability->set('test', 4);

        $seatsCollection = new SeatsCollection();
        $seatsCollection->add(new Seat('test', 2));

        //and  reservation list
        $reservation = new ReservationsCollection();
        $reservation->add(new Reservation(new ReservationId($conferenceId, $orderId), $seatsCollection));

        //and waiting reservation list
        $reservationWait = new ReservationsCollection();

        //and price for conference seats
        $conferenceSeatsDao = $this->getMockBuilder(ConferenceSeatsDao::class)
            ->disableOriginalConstructor()
            ->getMock();

        $conferenceSeatsDao->method('getSeatsPrices')
            ->with($conferenceId)
            ->willReturn([
                'test' => [
                    0 => '19.00'
                ]
            ]);

        $conference = new Conference($conferenceId, $seatsAvailability, $reservation, $reservationWait,$conferenceSeatsDao);

        // and discount stategy for order
        $discountService = new DiscountService(new SeatsStrategyConfiguration());


        //when purchase reservation
        $totalValue = $conference->purchase($orderId, $discountService);

        //then get correct total value
        $this->assertEquals($expectedTotalValue, $totalValue);

    }
}
