Cancelling reservation:
* If reservation for order is cancelled, number of available seats is increased by the number of the seats from reservation.
* We shouldn't be able to cancel reservation that doesn't exist.
* Cancelling reservation should remove it from reservation list.
* Cancelling reservation should remove it from waiting list.
* When we cancel a reservation, and there is another reservation on the waiting list with enough seats, we add it to reservation list.
* If we cancel a reservation, and there is another reservation, but with more seats than available, we should not add it to reservation list.