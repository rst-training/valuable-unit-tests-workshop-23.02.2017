<?php

// class TotalCostService extends \PHPUnit_Framework_TestCase
// {
//     public function calculates_total_reservation_cost_including_discounts_based_on_seats_selected()
//     {
//         $seats = new SeatPrice[];

//         $discountServiceMock = $this->getMockBuilder(DiscountService::class)
//                          ->setMethods(['calculateForSeat'])
//                          ->getMock();

//         $discountServiceMock->method('calculateForSeat')
//             ->willReturn($this->argument('0') * 0.85);
//         $totalCostService = new TotalCostService($discountServiceMock);

//         $this->assertEqual(
//             $totalCostService->calculateTotalCost($seats),
//             $expectedTotalCost
//         );
//     }
// }
