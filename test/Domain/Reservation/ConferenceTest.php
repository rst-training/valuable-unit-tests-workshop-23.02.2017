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


    public function if_reservation_exists_while_reserving()
    {
    }

    public function adds_to_waiting_lists_if_has_no_available_while_reserving()
    {
    }

    public function decreases_quantity_if_can_make_reservation()
    {
    }

    public function adds_new_reservation()
    {
    }
}
