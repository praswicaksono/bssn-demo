<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CancelBookingController extends Controller
{
    public function __invoke(Request $request)
    {
        $json = $request->json();

        /** @var Booking $booking */
        $booking = Booking::findOrFail($json->get('booking_id'));
        $booking->status = 'rejected';
        $booking->save();

        $event = $booking->event;
        $event->quota = $event->quota + 1;
        $event->save();

        return new JsonResponse();
    }
}
