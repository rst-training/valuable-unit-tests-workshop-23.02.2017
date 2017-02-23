<?php

/**
 * Created by PhpStorm.
 * User: pdorofiejczyk
 * Date: 23.02.17
 * Time: 10:41
 */
class RegistrationServiceTest extends \PHPUnit_Framework_TestCase
{
    public function registration_cost_should_be_equal_to_regular_seat_price_when_no_discount()
    {
        $conferenceRepository = new \RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository();
        $conferenceRepository->add(new \RstGroup\ConferenceSystem\Domain\Reservation\Conference(
            new \RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId(1),
            new \RstGroup\ConferenceSystem\Domain\Reservation\SeatsAvailabilityCollection(),
            new \RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection(),
            new \RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection()
        ));

        $this->getMock(\RstGroup\ConferenceSystem\Application\RegistrationService::class)
            ->method('getConferenceRepository')
            ->willReturn($conferenceRepository);
    }
}