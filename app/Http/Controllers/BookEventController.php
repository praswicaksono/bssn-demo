<?php

namespace App\Http\Controllers;

use App\Service\Booking\BookingInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookEventController extends Controller
{
    public function __construct(private readonly BookingInterface $booking)
    {

    }
    public function __invoke(Request $request)
    {
        $json = $request->json();

        $this->booking->bookEvent((int) $json->get('event_id'));

        return new JsonResponse();
    }
}
