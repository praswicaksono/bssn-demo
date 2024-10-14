<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookEventController extends Controller
{
    public function __invoke(Request $request)
    {
        $json = $request->json();

        /** @var Event $event */
        $event = Event::findOrFail($json->get('event_id'));

        if ($event->quota <= 0) {
            return new JsonResponse(['error' => 'quota limit exceeded'], 400);
        }

        $booking = new Booking();
        $booking->event_id = $json->get('event_id');
        $event->quota = $event->quota -1;
        $booking->save();
        $event->save();

        return new JsonResponse();
    }
}
