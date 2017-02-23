<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;

class Conference
{
    protected $id;

    /**
     * @var SeatsAvailabilityCollection
     */
    protected $seatsAvailability;
    protected $waitList;
    protected $reservations;
    protected $conferenceSeatDao;

    /**
     * @param Seat[] $seats
     */
    public function __construct(ConferenceId $id,
                                SeatsAvailabilityCollection $seatsAvailability,
                                ReservationsCollection $reservations,
                                ReservationsCollection $waitList,
    ConferenceSeatsDao $conferenceSeatsDao
    )
    {
        $this->id = $id;

        $this->seatsAvailability = $seatsAvailability;

        $this->reservations = $reservations;
        $this->waitList = $waitList;
        $this->conferenceSeatDao = $conferenceSeatsDao;
    }

    /**
     * @param OrderId $orderId
     * @param SeatsCollection $seats
     * @throws ReservationAlreadyExist
     */
    public function makeReservationForOrder(OrderId $orderId, SeatsCollection $seats)
    {
        if ($this->isReservationForOrder($orderId)) {
            throw new ReservationAlreadyExist();
        }

        foreach ($seats->getAll() as $seat) {
            if ($this->seatsAvailability->getQuantity($seat->getType()) < $seat->getQuantity()) {
                $this->waitList->add(new Reservation(new ReservationId($this->id, $orderId), $seats));
                return;
            }
        }

        foreach ($seats->getAll() as $seat) {
            $this->seatsAvailability->decrementQuantity($seat->getType(), $seat->getQuantity());
        }

        $this->reservations->add(new Reservation(new ReservationId($this->id, $orderId), $seats));
    }

    /**
     * @param $orderId
     * @throws ReservationDoesNotExist
     */
    public function cancelReservationForOrder($orderId)
    {
        if (!$this->isReservationForOrder($orderId)) {
            throw new ReservationDoesNotExist();
        }

        $reservation = $this->reservations->get(new ReservationId($this->id, $orderId));

        /** @var Seat $seat */
        foreach ($reservation->getSeats()->getAll() as $seat) {
            $this->seatsAvailability->incrementQuantity($seat->getType(), $seat->getQuantity());
        }

        $this->reservations->remove($reservation->getReservationId());

        foreach ($this->waitList->getAll() as $reservation) {
            $canBeMoved = true;

            foreach ($reservation->getSeats()->getAll() as $seat) {
                if ($this->seatsAvailability->getQuantity($seat->getType()) < $seat->getQuantity()) {
                    $canBeMoved = false;
                    break;
                }
            }

            if ($canBeMoved) {
                foreach ($reservation->getSeats()->getAll() as $seat) {
                    $this->seatsAvailability->decrementQuantity($seat->getType(), $seat->getQuantity());
                }

                $this->reservations->add($reservation);
                $this->waitList->remove($reservation->getReservationId());
                break;
            }
        }

    }

    public function purchase(OrderId $orderId,DiscountService $discountService)
    {
        $reservation = $this->getReservations()->get(new ReservationId($this->id, $orderId));

        $totalCost = 0;
        $seats = $reservation->getSeats();
        $seatsPrices = $this->conferenceSeatDao->getSeatsPrices($this->id);

        foreach ($seats->getAll() as $seat) {
            $priceForSeat = $seatsPrices[$seat->getType()][0];

            $dicountedPrice = $discountService->calculateForSeat($seat, $priceForSeat);
            $regularPrice = $priceForSeat * $seat->getQuantity();

            $totalCost += min($dicountedPrice, $regularPrice);
        }

        $this->closeReservationForOrder($orderId);

        return $totalCost;
    }

    public function closeReservationForOrder(OrderId $orderId)
    {
        //todo
    }

    public function getFreeSeatsCountByType($type)
    {
        return $this->seatsAvailability->getQuantity($type);
    }

    public function isReservationForOrderOnWaitList(OrderId $orderId)
    {
        return $this->waitList->has(new ReservationId($this->id, $orderId));
    }

    public function isReservationForOrder(OrderId $orderId)
    {
        return $this->reservations->has(new ReservationId($this->id, $orderId));
    }

    /**
     * @return ConferenceId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ReservationsCollection
     */
    public function getReservations()
    {
        return $this->reservations;
    }


}
