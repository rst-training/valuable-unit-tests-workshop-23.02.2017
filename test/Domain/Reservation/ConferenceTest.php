<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

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

class ConferenceTest extends \PHPUnit_Framework_TestCase
{
    public function testReservationIsCancelledForGivenOrderAndCanBeMoved()
    {
        $this->markTestSkipped();
    }

    public function testReservationIsCancelledForGivenOrderAndCanNotBeMoved()
    {
        $this->markTestSkipped();
    }

    public function testThrowsExceptionIfReservationDoesNotExist()
    {
        $this->markTestSkipped();
    }

    public function testThrowsExceptionForInvalidFormatOfOrderId()
    {
        $this->markTestSkipped();
    }
}
