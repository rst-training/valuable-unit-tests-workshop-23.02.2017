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
    /**
     * @todo: remove it
     */
    public function test_example_name()
    {
        $this->markTestSkipped();
    }

    public function test_throws_an_exception_if_reservation_with_passed_orderid_already_exists() {

    }

    public function test_adds_reservation_to_waitlist_with_passed_orderid_if_theres_not_enough_seats_available()
    {

    }

    public function test_adds_new_reservation_with_passed_orderid_if_theres_enough_available_seats()
    {

    }

    public function test_decrements_available_seats_quantity_when_reservation_has_been_made()
    {

    }
}
