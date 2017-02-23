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
     * @test
     */
    public function check_if_seats_are_available_after_canceling_existing_reservation()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function check_if_seats_are_automatically_booked_from_wait_list_after_canceling_existing_reservation()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function check_if_fail_when_canceling_not_existing_reservation()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function check_if_fail_when_canceling_reservation_with_wrong_order_id()
    {
        $this->markTestSkipped();
    }
}
