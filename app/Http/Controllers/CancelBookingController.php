<?php

namespace App\Http\Controllers;

use App\Service\Booking\BookingInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CancelBookingController extends Controller
{
    public function __construct(private readonly BookingInterface $booking)
    {

    }

    public function __invoke(Request $request)
    {
        $json = $request->json();

        $this->booking->cancelBooking($json->get('booking_id'));

        return new JsonResponse();
    }
}
